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

class MailOutTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function not_authencticaed_user_cant_access_features()
    {
        $response = $this->get(route('user.mail.out.index'));

        $response->assertRedirect('/login');
    }

    /** @test */
    public function other_than_users_cant_access_features()
    {
        $user = User::whereHas('level', function ($query) {
            return $query->where('name', 'TU');
        })->first();

        $response = $this->actingAs($user)->get(route('user.mail.out.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function user_can_access_features()
    {
        $user = $this->user();

        $response = $this->actingAs($user)->get(route('user.mail.out.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_store_mail_out()
    {
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
        $response = $this->actingAs($user)->post(route('user.mail.out.store'), $this->validMailRequestData());

        $response->assertStatus(200);
        $this->assertDatabaseCount('mails', $state['mails_count'] + 1);
        $this->assertDatabaseHas('mails', $this->validMailOutData());

        $this->assertDatabaseCount('mail_attribute_transactions', $state['mail_attribute_transactions_count'] + $state['mail_attribute_types']->count());

        $this->assertDatabaseCount('files', $state['files_count'] + 1);

        Storage::disk('files')->assertExists('test.jpg');

        $this->assertDatabaseCount('files', $state['files_count'] + 1);
        $this->assertDatabaseHas('files', [
            'original_name' => 'test.jpg'
        ]);

        $this->assertDatabaseCount('mail_versions', $state['mail_versions_count'] + 1);

        $this->assertDatabaseCount('mail_transactions', $state['mail_transactions_count'] + 1);

        $this->assertDatabaseHas('mail_transactions', [
            'user_id' => $user->id,
            'target_user_id' => User::whereHas('level', function ($query) {
                return $query->where('name', Level::LEVEL_KADEP);
            })
                ->whereHas('department', function ($query) {
                    return $query->where('name', 'Software');
                })
                ->first()->id,
            'mail_version_id' => $state['mail_versions_count'] + 1,
            'type' => "FORWARD",
        ]);

        $this->assertDatabaseHas('mail_transaction_logs', [
            'mail_transaction_id' => $state['mail_transactions_count'] + 1,
            'log' => 'Dibuat oleh ',
            'user_name' => $user->name,
            'user_level_department' => $user->level->name . " " . $user->department->name,
        ]);
    }

    // STATIC DATA SECTION
    public function user()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_ANGGOTA);
        })
            ->whereHas('department', function ($query) {
                return $query->where('name', 'Software');
            })
            ->first();
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
