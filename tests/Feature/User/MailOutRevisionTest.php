<?php

namespace Tests\Feature\User;

use App\Models\Level;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $response = $this->actingAs($user)->post(route('user.mail.out.revision.store', $mail));
        $response->assertStatus(404);
    }

    /** @test */
    public function an_authorized_user_can_store_revision()
    {
        $user = $this->authorizedUser();
        $mail = Mail::find(1);
        $response = $this->actingAs($user)->post(route('user.mail.out.revision.store', $mail));
        $response->assertOk();

        $this->assertDatabaseHas('mail_transactions', [
            'mail_version_id' => $mail->id,
            'type' => 'REVISION',
            'user_id' => $user->id,
            'target_user_id' => $user->getUpperUser('out')->id,
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
