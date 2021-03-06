<?php

namespace Tests\Feature\User;

use App\Models\Level;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailOutForwardTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function unauthorized_user_cant_forward_mail_out()
    {
        $response = $this->actingAs($this->user())->post(route('user.mail.out.forward.store', 1));

        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_forward_mail_out()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->authorizedMailOutUser())->post(route('user.mail.out.forward.store', 1));

        $response->assertOk();
        $this->assertDatabaseCount('mail_transactions', 3);
        $this->assertDatabaseHas('mail_transactions', [
            'id' => 3,
            'mail_version_id' => 1,
            'user_id' => $this->authorizedMailOutUser()->id,
            'target_user_id' => 8,
            'type' => 'FORWARD'
        ]);

        $this->assertDatabaseCount('mail_logs', 1);

        $this->assertDatabaseHas('mail_logs', [
            'id' => 1,
            'mail_transaction_id' => 3,
            'log' => "Diteruskan oleh ",
            'user_name' => 'Adis Wing Kasenda',
            'user_level_department' => 'Kepala Departemen Software'
        ]);
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
}
