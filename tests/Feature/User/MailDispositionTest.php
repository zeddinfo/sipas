<?php

namespace Tests\Feature\User;

use App\Models\Level;
use App\Models\MailTransaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailDispositionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function unauthorized_user_cant_create()
    {
        $response = $this->actingAs($this->unauthorizedUser())->get(route('user.mail.in.disposition.create', 2));
        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_create()
    {
        $response = $this->actingAs($this->sekretarisUser())->get(route('user.mail.in.disposition.create', 2));
        $response->assertOk();
    }

    /** @test */
    public function authorized_user_cant_store_if_data_invalid()
    {
        $response = $this->actingAs($this->sekretarisUser())->post(route('user.mail.in.disposition.store', 2), $this->invalidRequest());

        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_store_if_data_valid()
    {
        $response = $this->actingAs($this->sekretarisUser())->post(route('user.mail.in.disposition.store', 2), $this->validRequest());

        $response->assertOk();

        $this->assertDatabaseCount('mail_transactions', 3);

        $this->assertDatabaseHas('mail_transactions', [
            'mail_version_id' => 2,
            'user_id' => 6,
            'target_user_id' => 4,
            'type' => MailTransaction::TYPE_DISPOSITION
        ]);

        $this->assertDatabaseCount('mail_transaction_memos', 1);
        $this->assertDatabaseHas('mail_transaction_memos', [
            'mail_transaction_id' => 3,
            'memo' => 'Note from sekretaris'
        ]);

        $this->assertDatabaseCount('mail_logs', 1);
        $this->assertDatabaseHas('mail_logs', [
            'mail_transaction_id' => 3,
            'log' => 'Didisposisikan oleh ',
            'user_name' => $this->sekretarisUser()->name,
            'user_level_department' => "Sekretaris ",
        ]);
    }

    /** @test */
    public function next_authorized_user_can_store_if_data_valid()
    {
        $this->actingAs($this->sekretarisUser())->post(route('user.mail.in.disposition.store', 2), $this->validRequest());
        $response = $this->actingAs($this->ketumUser())->post(route('user.mail.in.disposition.store', 2), $this->nextValidRequest());

        $response->assertOk();

        $this->assertDatabaseCount('mail_transactions', 5);

        $this->assertDatabaseHas('mail_transactions', [
            'mail_version_id' => 2,
            'user_id' => 4,
            'target_user_id' => 8,
            'type' => MailTransaction::TYPE_DISPOSITION
        ]);

        $this->assertDatabaseHas('mail_transactions', [
            'mail_version_id' => 2,
            'user_id' => 4,
            'target_user_id' => 9,
            'type' => MailTransaction::TYPE_DISPOSITION
        ]);

        $this->assertDatabaseCount('mail_transaction_memos', 3);
        $this->assertDatabaseHas('mail_transaction_memos', [
            'mail_transaction_id' => 4,
            'memo' => 'Note from ketum'
        ]);

        $this->assertDatabaseHas('mail_transaction_memos', [
            'mail_transaction_id' => 5,
            'memo' => 'Note from ketum'
        ]);

        $this->assertDatabaseCount('mail_logs', 3);
        $this->assertDatabaseHas('mail_logs', [
            'mail_transaction_id' => 4,
            'log' => 'Didisposisikan oleh ',
            'user_name' => $this->ketumUser()->name,
            'user_level_department' => "Ketua Umum ",
        ]);
        $this->assertDatabaseHas('mail_logs', [
            'mail_transaction_id' => 5,
            'log' => 'Didisposisikan oleh ',
            'user_name' => $this->ketumUser()->name,
            'user_level_department' => "Ketua Umum ",
        ]);
    }


    // STATIC DATA

    public function unauthorizedUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_KADEP);
        })->first();
    }

    public function sekretarisUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_SEKRETARIS);
        })->first();
    }

    public function ketumUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_KETUM);
        })->first();
    }

    public function invalidRequest()
    {
        return [
            'memo' => 'Note from sekretaris',
            'target_user_ids' => [8, 9],
        ];
    }

    public function validRequest()
    {
        return [
            'memo' => 'Note from sekretaris',
            'target_user_ids' => [4],
        ];
    }

    public function nextValidRequest()
    {
        return [
            'memo' => 'Note from ketum',
            'target_user_ids' => [8, 9],
        ];
    }
}
