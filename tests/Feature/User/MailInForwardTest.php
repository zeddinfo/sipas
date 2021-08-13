<?php

namespace Tests\Feature\User;

use App\Models\Department;
use App\Models\Level;
use App\Models\MailLog;
use App\Models\MailTransaction;
use App\Models\MailTransactionLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailInForwardTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function unauthorized_user_cant_create()
    {
        $response = $this->actingAs($this->unauthorizedUser())->get(route('user.mail.in.forward.create', 2));
        $response->assertNotFound();
    }

    /** @test */
    public function authorized_with_disposition_user_will_redirected_to_disposition()
    {
        $response = $this->actingAs($this->sekretarisUser())->get(route('user.mail.in.forward.create', 2));
        $response->assertRedirect(route('user.mail.in.disposition.create', 2));
    }

    /** @test */
    public function authorized_user_with_can_create()
    {
        $this->actingAs($this->sekretarisUser())->post(route('user.mail.in.disposition.store', 2), $this->validDispositionRequest());
        $this->actingAs($this->ketumUser())->post(route('user.mail.in.disposition.store', 2), $this->nextValidDispositionRequest());

        $response = $this->actingAs($this->kabidUser())->get(route('user.mail.in.forward.create', 2));

        $response->assertOk();
    }

    /** @test */
    public function authorized_user_with_invalid_data_cant_store()
    {
        $this->actingAs($this->sekretarisUser())->post(route('user.mail.in.disposition.store', 2), $this->validDispositionRequest());
        $this->actingAs($this->ketumUser())->post(route('user.mail.in.disposition.store', 2), $this->nextValidDispositionRequest());

        $response = $this->actingAs($this->kabidUser())->post(route('user.mail.in.forward.store', 2), $this->invalidRequest());

        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_with_valid_data_can_store()
    {
        $this->actingAs($this->sekretarisUser())->post(route('user.mail.in.disposition.store', 2), $this->validDispositionRequest());
        $this->actingAs($this->ketumUser())->post(route('user.mail.in.disposition.store', 2), $this->nextValidDispositionRequest());

        $response = $this->actingAs($this->kabidUser())->post(route('user.mail.in.forward.store', 2), $this->validRequest());

        $response->assertOk();

        $this->assertDatabaseCount('mail_transactions', 6);
        $this->assertDatabaseHas('mail_transactions', [
            'mail_version_id' => 2,
            'user_id' => $this->kabidUser()->id,
            'target_user_id' => 10,
            'type' => MailTransaction::TYPE_FORWARD,
        ]);

        $this->assertDatabaseCount('mail_logs', 4);
        $this->assertDatabaseHas('mail_logs', [
            'mail_transaction_id' => 6,
            'user_name' => $this->kabidUser()->name,
            'log' => MailLog::LOG_FORWARDED,
        ]);
    }

    // STATIC DATA
    public function sekretarisUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_SEKRETARIS);
        })->first();
    }

    public function ketumUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_KETUM);
        })->first();
    }

    public function kabidUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_KABID);
        })
            ->whereHas('department', function ($query) {
                $query->where('name', "Ilmu Pengetahuan dan Teknologi");
            })
            ->first();
    }

    public function unauthorizedUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_KADEP);
        })->first();
    }

    public function validDispositionRequest()
    {
        return [
            'memo' => 'Note from sekretaris',
            'target_user_ids' => [4],
        ];
    }

    public function nextValidDispositionRequest()
    {
        return [
            'memo' => 'Note from ketum',
            'target_user_ids' => [8, 9],
        ];
    }

    public function invalidRequest()
    {
        return [
            'target_user_ids' => [4],
        ];
    }

    public function validRequest()
    {
        return [
            'target_user_ids' => [10],
        ];
    }
}
