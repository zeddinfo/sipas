<?php

namespace Tests\Feature\User;

use App\Models\Level;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use MailTransactionLogs;
use Tests\TestCase;

class MailInActionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;
    /** @test */
    public function unauthorized_user_cant_forward_mail_in()
    {
        $response = $this->actingAs($this->user())->post(route('tu.mail.in.action.forward', 2));
        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_forward_mail_in()
    {
        $this->withoutExceptionHandling();

        // dd($this->authorizedMailInUser());
        $response = $this->actingAs($this->authorizedMailInUser())->post(route('user.mail.in.action.forward', 2));
        $response->assertOk();
        // dd($response);

        $this->assertDatabaseCount('mail_transactions', 2);
        $this->assertDatabaseHas('mail_transactions', [
            'id' => 2,
            'mail_version_id' => 2,
            'user_id' => $this->user_id()->id,
            'target_user_id' => $this->authorizedMailInUser()->id,
            'type' => 'FORWARD'
        ]);

        $this->assertDatabaseCount('mail_transaction_logs', 1);

        $this->assertDatabaseHas('mail_transaction_logs', [
            'id' => 1,
            'mail_transaction_id' => 1,
            'log' => "Dibuat ",
            'user_name' => 'kepala_tu',
            'user_level_department' => "16"
        ]);
    }



    // STATIC DATA SECTION
    public function user()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_ADMIN);
        })->first();
    }

    public function user_id()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_TU);
        })->first();
    }

    public function authorizedMailInUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_SEKRETARIS);
        })->first();
    }
}
