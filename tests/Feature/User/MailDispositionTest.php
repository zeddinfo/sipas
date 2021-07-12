<?php

namespace Tests\Feature\User;

use App\Models\Level;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailDispositionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;
    /** @test */
    public function authorized_user_can_create()
    {
        $response = $this->actingAs($this->authorizedMailInUser())->get(route('user.mail.in.disposition.create', 2));
        $response->assertOk();
    }

    /** @test */
    public function authorized_user_can_store()
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->authorizedMailInUser())->post(route('user.mail.in.disposition.store', 2), $this->validMailOutData());
        $response->assertOk();
    }

    public function authorizedMailInUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', Level::LEVEL_KABID);
        })->first();
    }

    public function validMailOutData()
    {
        return [
            'note' => 'Surat Keluar Baru',
            'user_ids' => [10, 13],
        ];
    }
}
