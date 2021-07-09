<?php

namespace Tests\Unit;

use App\Models\Level;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function get_mail_out_upper_user_is_valid()
    {
        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_ANGGOTA);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Software");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Software");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_ANGGOTA);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Hardware");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Hardware");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_ANGGOTA);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Kastra");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Kastra");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_ANGGOTA);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Pengkaderan");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Pengkaderan");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Software");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KABID);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Ilmu Pengetahuan dan Teknologi");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Pengkaderan");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KABID);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Penelitian dan Pengembangan SDM");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Kastra");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KABID);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Penelitian dan Pengembangan SDM");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', 'Asisten ' . Level::LEVEL_KADEP);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Kastra");
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KABID);
            })
            ->whereHas('department', function ($query) {
                $query->where('name', "Penelitian dan Pengembangan SDM");
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KABID);
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_SEKRETARIS);
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_SEKRETARIS);
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KETUM);
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_KETUM);
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_TU);
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));


        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', 'Asisten ' . Level::LEVEL_KETUM);
            })
            ->first();

        $expected_upper_user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', Level::LEVEL_TU);
            })
            ->first();

        $this->assertEquals($expected_upper_user, $user->getUpperUser('out'));

        $user = User::query()
            ->whereHas('level', function ($query) {
                $query->where('name', 'Asisten ' . Level::LEVEL_TU);
            })
            ->first();

        try {
            $user->getUpperUser('out');
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), 'Current user has highest level');
        }
    }
}
