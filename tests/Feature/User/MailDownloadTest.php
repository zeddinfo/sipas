<?php

namespace Tests\Feature\User;

use App\Models\Level;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailDownloadTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function an_unathorized_user_cant_download_mail()
    {
        $response = $this->actingAs($this->unauthorizedUser())->post(route('user.mail.download', 1));

        $response->assertNotFound();
    }

    /** @test */
    public function an_athorized_user_can_download_mail()
    {
        $response = $this->actingAs($this->authorizedUser())->post(route('user.mail.download', 1));

        $response->assertRedirect();
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
            return $query->where('name', Level::LEVEL_KABID);
        })
            ->whereHas('department', function ($query) {
                return $query->where('name', 'Penelitian dan Pengembangan SDM');
            })
            ->first();
    }
}
