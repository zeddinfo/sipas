<?php

namespace Tests\Feature\Administration;

use Tests\TestCase;
use App\Models\Mail;
use App\Models\User;
use App\Models\Level;
use App\Models\MailAttribute;
use Illuminate\Support\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailMasterTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function unauthorized_user_cant_access_show()
    {
        $response = $this->actingAs($this->normalUser())->get(route('tu.mail.master.show', 1));

        $response->assertNotFound();
    }

    /** @test */
    public function unauthorized_admin_user_cant_access_show()
    {
        $response = $this->actingAs($this->adminUser())->get(route('tu.mail.master.show', 1));

        $response->assertNotFound();
    }

    /** @test */
    public function tu_can_access_show()
    {
        $response = $this->actingAs($this->tuUser())->get(route('tu.mail.master.show', 1));

        $response->assertOk();
    }

    /** @test */
    public function tu_can_access_edit()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->tuUser())->get(route('tu.mail.master.edit', 1));

        $response->assertOk();
    }

    /** @test */
    public function tu_can_perform_update_with_file()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->tuUser())->patch(route('tu.mail.master.update', 1), $this->validMailRequestData());

        $response->assertOk();

        $this->assertDatabaseCount('mails', 2);
        $this->assertDatabaseHas('mails', $this->validMailOutData());
        $this->assertDatabaseCount('files', 3);
        $this->assertDatabaseHas('mail_versions', [
            'id' => 3,
            'mail_id' => 1,
            'file_id' => 3
        ]);

        $this->assertDatabaseCount('mail_transaction_logs', 1);
        $this->assertDatabaseHas('mail_transaction_logs', [
            'id' => 1,
            'mail_transaction_id' => 1,
            'log' => 'Diubah oleh ',
            'user_name' => 'TU'
        ]);
    }

    /** @test */
    public function tu_can_perform_update_without_file()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->tuUser())->patch(route('tu.mail.master.update', 1), array_merge($this->validMailRequestData(), ['file' => '']));

        $response->assertOk();

        $this->assertDatabaseCount('mails', 2);
        $this->assertDatabaseHas('mails', $this->validMailOutData());
        $this->assertDatabaseCount('files', 2);
        $this->assertDatabaseHas('mail_versions', [
            'id' => 3,
            'mail_id' => 1,
            'file_id' => 1
        ]);

        $this->assertDatabaseCount('mail_transaction_logs', 1);
        $this->assertDatabaseHas('mail_transaction_logs', [
            'id' => 1,
            'mail_transaction_id' => 1,
            'log' => 'Diubah oleh ',
            'user_name' => 'TU'
        ]);
    }

    /** @test */
    public function tu_can_perform_delete()
    {
        $response = $this->actingAs($this->tuUser())->delete(route('tu.mail.master.destroy', 1));

        $response->assertOk();

        $this->assertSoftDeleted('mails', [
            'id' => 1
        ]);
    }

    /** @test */
    public function tu_can_perform_archive()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->tuUser())->post(route('tu.mail.master.archive', 1));

        $response->assertOk();

        $this->assertDatabaseCount('mails', 2);
        $this->assertNotNull(Mail::find(1)->archived_at);
    }

    /** @test */
    public function tu_can_perform_download()
    {
        $response = $this->actingAs($this->tuUser())->post(route('tu.mail.master.download', 1));

        $response->assertRedirect();
    }

    // STATIC DATA
    public function adminUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_ADMIN);
        })->first();
    }

    public function normalUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_KABID);
        })->first();
    }

    public function tuUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_TU);
        })->first();
    }

    public function validMailRequestData()
    {
        return array_merge($this->validMailOutData(), [
            'mail_attributes' => [
                MailAttribute::where('type', 'Tipe')->first()->id,
                MailAttribute::where('type', 'Sifat')->first()->id,
                MailAttribute::where('type', 'Prioritas')->first()->id
            ],
            'file' => UploadedFile::fake()->image('test.jpg'),
        ]);
    }

    public function validMailOutData()
    {
        return [
            'title' => 'Surat Keluar Baru',
            'instance' => 'Instansi Tertuju',
            'mail_created_at' => Carbon::create(2020, 5, 1)->toDateString(),
        ];
    }
}
