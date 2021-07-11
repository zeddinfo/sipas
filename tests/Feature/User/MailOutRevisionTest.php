<?php

namespace Tests\Feature\User;

use App\Models\Level;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class MailOutRevisionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function an_unauthorized_user_cant_create_revision()
    {
        $user = $this->unauthorizedUser();
        $mail = Mail::find(1);
        $response = $this->actingAs($user)->get(route('user.mail.out.revision.create', $mail));
        $response->assertStatus(404);
    }

    /** @test */
    public function an_authorized_user_can_create_revision()
    {
        $user = $this->authorizedUser();
        $mail = Mail::find(1);
        $response = $this->actingAs($user)->get(route('user.mail.out.revision.create', $mail));
        $response->assertOk();
    }

    /** @test */
    public function an_unauthorized_user_cant_store_revision()
    {
        $user = $this->unauthorizedUser();
        $mail = Mail::find(1);
        $response = $this->actingAs($user)->post(route('user.mail.out.revision.store', $mail), [
            'note' => 'Testing 123'
        ]);
        $response->assertStatus(404);
    }

    /** @test */
    public function an_authorized_user_can_store_revision()
    {
        $this->withoutExceptionHandling();

        $user = $this->authorizedUser();
        $mail = Mail::find(1);
        $response = $this->actingAs($user)->post(route('user.mail.out.revision.store', $mail), [
            'note' => 'Testing 123'
        ]);
        $response->assertOk();

        $this->assertDatabaseHas('mail_transactions', [
            'mail_version_id' => $mail->id,
            'type' => 'REVISION',
            'user_id' => $user->id,
            'target_user_id' => 15,
        ]);

        $this->assertDatabaseHas('mail_transaction_corrections', [
            'mail_transaction_id' => 3,
            'note' => 'Testing 123',
        ]);
    }

    /** @test */
    public function an_authorized_user_can_store_revision_with_file()
    {
        $this->withoutExceptionHandling();
        Storage::fake('files');

        $user = $this->authorizedUser();
        $mail = Mail::find(1);
        $response = $this->actingAs($user)->post(route('user.mail.out.revision.store', $mail), [
            'note' => 'Testing 123',
            'file' => UploadedFile::fake()->image('test.jpg')
        ]);

        $response->assertOk();

        $this->assertDatabaseHas('mail_transactions', [
            'mail_version_id' => $mail->id,
            'type' => 'REVISION',
            'user_id' => $user->id,
            'target_user_id' => 15,
        ]);

        $this->assertDatabaseCount('files', 3);

        $this->assertDatabaseHas('mail_transaction_corrections', [
            'mail_transaction_id' => 3,
            'note' => 'Testing 123',
            'file_id' => 3,
        ]);

        $this->assertDatabaseCount('mail_transaction_logs', 1);

        $this->assertDatabaseHas('mail_transaction_logs', [
            'id' => 1,
            'mail_transaction_id' => 3,
            'log' => "Direvisi oleh ",
            'user_name' => 'Adis Wing Kasenda',
            'user_level_department' => 'Kepala Departemen Software'
        ]);
    }

    // STATIC DATA SECTION
    public function authorizedUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_KADEP);
        })
            ->whereHas('department', function ($query) {
                return $query->where('name', 'Software');
            })
            ->first();
    }

    public function unauthorizedUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_ANGGOTA);
        })
            ->whereHas('department', function ($query) {
                return $query->where('name', 'Software');
            })
            ->first();
    }
}
