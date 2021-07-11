<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountSettingTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function user_can_access_edit()
    {
        $response = $this->actingAs($this->user())->get(route('user.setting.account.edit'));
        $response->assertOk();
    }

    /** @test */
    public function user_can_perform_update()
    {
        $response = $this->actingAs($this->user())->patch(route('user.setting.account.update'), $this->userDataWithPassword());
        $response->assertOk();

        $this->assertDatabaseCount('users', 18);

        $user_check = $this->userDataWithPassword();
        unset($user_check['password']);
        unset($user_check['password_confirmation']);

        $this->assertDatabaseHas('users', $user_check);
    }

    /** @test */
    public function user_can_perform_update_without_password()
    {
        $data_without_password = $this->userDataWithPassword();
        unset($data_without_password['password']);
        unset($data_without_password['password_confirmation']);

        $old_password = User::find(10)->password;

        $response = $this->actingAs($this->user())->patch(route('user.setting.account.update'), $data_without_password);
        $response->assertOk();

        $this->assertDatabaseCount('users', 18);

        $data_with_old_password = $data_without_password;
        $data_with_old_password['password'] = $old_password;
        $this->assertDatabaseHas('users', $data_with_old_password);
    }

    // STATIC DATA
    public function user()
    {
        return User::find(10);
    }

    public function userDataWithPassword()
    {
        return [
            'nip' => 'A11.2017.10810',
            'name' => 'Fathil Arham',
            'phone_number' => '+628 222 5210 125',
            'email' => 'fathil.arham@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ];
    }
}
