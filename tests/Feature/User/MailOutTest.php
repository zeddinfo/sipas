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

        $response->assertOk();
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

        $response->assertOk();
        $this->assertDatabaseCount('mails', $state['mails_count'] + 1);
        $this->assertDatabaseHas('mails', $this->validMailOutData());

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

    /** @test */
    public function unauthorized_user_cant_edit()
    {
        $user = $this->user();
        $response = $this->actingAs($user)->get(route('user.mail.out.edit', 1));
        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_edit()
    {
        $user = $this->authorizedMailOutUser();
        $response = $this->actingAs($user)->get(route('user.mail.out.edit', 1));
        $response->assertOk();
    }

    /** @test */
    public function authorized_user_can_update_with_file()
    {
        $this->withoutExceptionHandling();

        Storage::fake('files');

        $user = $this->user();
        $updating_user = $this->authorizedMailOutUser();
        // Store Mail Out
        $this->actingAs($user)->post(route('user.mail.out.store'), $this->validMailRequestData());
        $this->assertDatabaseCount('mails', 3);

        $mail_out_update_data = array_merge($this->validMailOutData(), ['title' => 'Updated title']);
        $mail_out_update_request = array_merge($this->validMailRequestData(), $mail_out_update_data, ['mail_attributes' => [4, 7, 10]]);

        // Request Patch
        $response = $this->actingAs($updating_user)->patch(route('user.mail.out.update', 3), $mail_out_update_request);

        $response->assertOk();
        $this->assertDatabaseHas('mails', $mail_out_update_data);

        $this->assertDatabaseMissing('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 1]);
        $this->assertDatabaseMissing('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 5]);
        $this->assertDatabaseMissing('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 8]);

        $this->assertDatabaseHas('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 4]);
        $this->assertDatabaseHas('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 7]);
        $this->assertDatabaseHas('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 10]);

        Storage::disk('files')->assertExists('test.jpg');
        $this->assertDatabaseHas('files', ['id' => 4]);

        $this->assertDatabaseHas('mail_versions', ['id' => 4, 'file_id' => 4]);

        $this->assertDatabaseHas('mail_transactions', [
            'user_id' => $updating_user->id,
            'target_user_id' => User::whereHas('level', function ($query) {
                return $query->where('name', Level::LEVEL_KABID);
            })
                ->whereHas('department', function ($query) {
                    return $query->where('name', 'Ilmu Pengetahuan dan Teknologi');
                })
                ->first()->id,
            'mail_version_id' => 4,
            'type' => "FORWARD",
        ]);

        $this->assertDatabaseHas('mail_transaction_logs', [
            'mail_transaction_id' => 4,
            'log' => 'Diubah oleh ',
            'user_name' => $updating_user->name,
            'user_level_department' => $updating_user->level->name . " " . $updating_user->department->name,
        ]);
    }

    /** @test */
    public function authorized_user_can_update_without_file()
    {
        $this->withoutExceptionHandling();

        $user = $this->user();
        $updating_user = $this->authorizedMailOutUser();
        // Store Mail Out
        $this->actingAs($user)->post(route('user.mail.out.store'), $this->validMailRequestData());
        $this->assertDatabaseCount('mails', 3);

        $mail_out_update_data = array_merge($this->validMailOutData(), ['title' => 'Updated title']);
        $mail_out_update_request = array_merge($this->validMailRequestData(), $mail_out_update_data, ['mail_attributes' => [4, 7, 10]], ['file' => '']);

        // Request Patch
        $response = $this->actingAs($updating_user)->patch(route('user.mail.out.update', 3), $mail_out_update_request);

        $response->assertOk();
        $this->assertDatabaseHas('mails', $mail_out_update_data);

        $this->assertDatabaseMissing('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 1]);
        $this->assertDatabaseMissing('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 5]);
        $this->assertDatabaseMissing('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 8]);

        $this->assertDatabaseHas('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 4]);
        $this->assertDatabaseHas('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 7]);
        $this->assertDatabaseHas('mail_attribute_transactions', ['mail_id' => 3, 'mail_attribute_id' => 10]);

        Storage::disk('files')->assertExists('test.jpg');
        $this->assertDatabaseCount('files', 3);

        $this->assertDatabaseHas('mail_versions', ['id' => 4, 'file_id' => 3]);

        $this->assertDatabaseHas('mail_transactions', [
            'user_id' => $updating_user->id,
            'target_user_id' => User::whereHas('level', function ($query) {
                return $query->where('name', Level::LEVEL_KABID);
            })
                ->whereHas('department', function ($query) {
                    return $query->where('name', 'Ilmu Pengetahuan dan Teknologi');
                })
                ->first()->id,
            'mail_version_id' => 4,
            'type' => MailTransaction::TYPE_FORWARD,
        ]);

        $this->assertDatabaseHas('mail_transaction_logs', [
            'mail_transaction_id' => 4,
            'log' => 'Diubah oleh ',
            'user_name' => $updating_user->name,
            'user_level_department' => $updating_user->level->name . " " . $updating_user->department->name,
        ]);
    }

    /** @test */
    public function a_user_wihtout_permission_cant_delete()
    {
        $user = $this->user();
        $deleted_mail = Mail::find(1);
        $response = $this->actingAs($user)->delete(route('user.mail.out.destroy', $deleted_mail->id));
        $response->assertNotFound();
        $this->assertDatabaseCount('mails', 2);
    }

    /** @test */
    public function a_user_with_permission_can_delete()
    {
        $user = $this->authorizedMailOutUser();
        $deleted_mail = Mail::select('id', 'title', 'instance', 'type')->find(1);
        $response = $this->actingAs($user)->delete(route('user.mail.out.destroy', $deleted_mail->id));
        $response->assertOk();
        $this->assertSoftDeleted('mails', $deleted_mail->toArray());
    }



    // STATIC DATA
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

    public function authorizedMailOutUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_KADEP);
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
