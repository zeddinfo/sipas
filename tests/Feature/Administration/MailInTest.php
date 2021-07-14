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
        $response = $this->get(route('tu.mail.in.index'));

        $response->assertRedirect('/login');
    }

    /** @test */
    public function other_than_users_cant_access_features()
    {
        $user = User::whereHas('level', function ($query) {
            return $query->where('name', 'Admin');
        })->first();

        $response = $this->actingAs($user)->get(route('tu.mail.in.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function user_can_access_features()
    {
        $user = $this->user();


        $response = $this->actingAs($user)->get(route('tu.mail.in.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_store_mail_in()
    {
        // $this->markTestSkipped();

        $this->withoutExceptionHandling();

        Storage::fake("files");

        $state['mails_count'] = Mail::count();
        $state['mail_attribute_transactions_count'] = MailAttributeTransaction::count();
        $state['mail_attribute_types'] = MailAttribute::select('type')->distinct()->get();
        $state['files_count'] = File::count();
        $state['mail_versions_count'] = MailVersion::count();
        $state['mail_transactions_count'] = MailTransaction::count();
        $state['mail_transaction_logs_count'] = MailTransactionLog::count();

        $user = $this->user();
        $response = $this->actingAs($user)->post(route('tu.mail.in.store'), $this->validMailRequestData());

        $response->assertStatus(200);
        $this->assertDatabaseCount('mails', $state['mails_count'] + 1);

        $this->assertDatabaseHas('mails', $this->validMailInData());

        $this->assertDatabaseCount('mail_attribute_transactions', $state['mail_attribute_transactions_count'] + $state['mail_attribute_types']->count());

        $this->assertDatabaseCount('files', $state['files_count'] + 1);

        Storage::disk('files')->assertExists('test.jpg');

        $this->assertDatabaseCount('files', $state['files_count'] + 1);
        $this->assertDatabaseHas('files', [
            'original_name' => 'test.jpg'
        ]);

        $this->assertDatabaseCount('mail_transactions', $state['mail_transactions_count'] + 1);

        $this->assertDatabaseHas('mail_transactions', [
            'user_id' => $user->id,
            'target_user_id' => User::whereHas('level', function ($query) {
                return $query->where('name', Level::LEVEL_SEKRETARIS);
            })->first()->id,
            'mail_version_id' => $state['mail_versions_count'] + 1,
            'type' => "FORWARD",
        ]);

        $this->assertDatabaseHas('mail_transaction_logs', [
            'mail_transaction_id' => $state['mail_transactions_count'] + 1,
            'log' => 'Dibuat oleh ',
            'user_name' => $user->name,
            'user_level_department' => $user->level?->name . " " . $user->department?->name,
        ]);
    }



    // STATIC DATA
    public function authorizedMailInUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_SEKRETARIS);
        })->first();
    }

    public function user()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_TU);
        })->first();
    }

    public function validMailRequestData()
    {
        return array_merge($this->validMailInData(), [
            'mail_attributes' => [
                MailAttribute::where('type', 'Tipe')->first()->id,
                MailAttribute::where('type', 'Sifat')->first()->id,
                MailAttribute::where('type', 'Prioritas')->first()->id
            ],
            'file' => UploadedFile::fake()->image('test.jpg'),
        ]);
    }

    public function validMailInData()
    {
        return [
            'type' => 'IN',
            'title' => 'Surat Masuk Baru',
            'instance' => 'Instansi Tertuju',
            // 'code' => 'abcde',
            'mail_created_at' => Carbon::create(2020, 5, 1)->toDateString(),
        ];
    }
}
