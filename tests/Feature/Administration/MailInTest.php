<?php

namespace Tests\Feature\User;

use App\Models\File;
use App\Models\Level;
use App\Models\Mail;
use App\Models\MailAttribute;
use App\Models\MailAttributeTransaction;
use App\Models\MailTransaction;
use App\Models\MailTransactionLog;
use App\Models\MailVersion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MailInTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function not_authencticaed_user_cant_access_features()
    {
        $response = $this->get(route('tu.mail.in.create'));

        $response->assertRedirect('/login');
    }

    /** @test */
    public function unauthorized_user_cant_access_features()
    {
        $response = $this->actingAs($this->unathorizedUser())->get(route('tu.mail.in.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_access_features()
    {
        $response = $this->actingAs($this->tuUser())->get(route('tu.mail.in.index'));

        $response->assertOk();
    }

    /** @test */
    public function user_can_store_mail_in()
    {

        Storage::fake("files");

        $state['mails_count'] = Mail::count();
        $state['mail_attribute_transactions_count'] = MailAttributeTransaction::count();
        $state['mail_attribute_types'] = MailAttribute::select('type')->distinct()->get();
        $state['files_count'] = File::count();
        $state['mail_versions_count'] = MailVersion::count();
        $state['mail_transactions_count'] = MailTransaction::count();
        $state['mail_logs_count'] = MailTransactionLog::count();

        $user = $this->tuUser();
        $response = $this->actingAs($user)->post(route('tu.mail.in.store'), $this->validRequestData());

        $response->assertOk();

        $this->assertDatabaseCount('mails', 3);

        $this->assertDatabasehas('mails', [
            'type' => 'IN',
            'title' => 'Surat Masuk Baru',
            'instance' => 'Instansi Tertuju',
            'code' => 'ABC123',
            'directory_code' => 'DEF123',
        ]);

        $this->assertDatabaseCount('mail_attribute_transactions', 9);


        $this->assertDatabasehas('mail_attribute_transactions', [
            'mail_id' => 3,
            'mail_attribute_id' => 1,
        ]);

        $this->assertDatabasehas('mail_attribute_transactions', [
            'mail_id' => 3,
            'mail_attribute_id' => 5,
        ]);

        $this->assertDatabasehas('mail_attribute_transactions', [
            'mail_id' => 3,
            'mail_attribute_id' => 8,
        ]);


        $this->assertDatabasehas('mail_versions', [
            'id' => 3,
            'mail_id' => 3,
            'file_id' => 3,
        ]);

        $this->assertDatabasehas('mail_transactions', [
            'id' => 3,
            'type' => MailTransaction::TYPE_FORWARD,
            'mail_version_id' => 3,
            'user_id' => 2,
            'target_user_id' => 6,
        ]);

        $this->assertDatabasehas('mail_logs', [
            'log' => "Dibuat oleh ",
            'user_name' => $this->tuUser()->name,
            'user_level_department' => "TU ",
        ]);
    }



    // STATIC DATA
    public function unathorizedUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_KADEP);
        })->first();
    }

    public function tuUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_TU);
        })->first();
    }

    public function validRequestData()
    {
        return array_merge($this->validData(), [
            'mail_attributes' => [
                MailAttribute::where('type', 'Tipe')->first()->id,
                MailAttribute::where('type', 'Sifat')->first()->id,
                MailAttribute::where('type', 'Prioritas')->first()->id
            ],
            'file' => UploadedFile::fake()->image('test.jpg'),
        ]);
    }

    public function validData()
    {
        return [
            'type' => 'IN',
            'title' => 'Surat Masuk Baru',
            'instance' => 'Instansi Tertuju',
            'code' => 'ABC123',
            'directory_code' => 'DEF123',
            'mail_created_at' => Carbon::create(2020, 5, 1)->toDateString(),
        ];
    }
}
