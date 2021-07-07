<?php

namespace Tests\Feature\Admin;

use App\Models\Department;
use App\Models\Level;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSettingTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function not_authencticaed_user_cant_access_features()
    {
        $response = $this->get(route('admin.setting.user.index'));

        $response->assertRedirect('/login');
    }

    /** @test */
    public function other_than_admin_cant_access_features()
    {
        $user = User::whereHas('level', function ($query) {
            return $query->where('name', '!=', 'Admin');
        })->first();

        $response = $this->actingAs($user)->get(route('admin.setting.user.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function admin_can_access_features()
    {
        $user = $this->adminUser();

        $response = $this->actingAs($user)->get(route('admin.setting.user.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function create_can_accessed()
    {
        $user = $this->adminUser();

        $response = $this->actingAs($user)->get(route('admin.setting.user.create'));

        $response->assertStatus(200);
    }

    /** @test */
    public function store_can_performed_if_data_is_valid()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $user = $this->adminUser();

        $response = $this->actingAs($user)->post(route('admin.setting.user.store', $this->validUserData()));

        $response->assertStatus(200);
        $this->assertDatabaseCount('users', 17);
        $this->assertDatabaseHas('users', $this->validUserData());
    }

    /** @test */
    public function validate_when_name_is_empty()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['name' => '']);
    }

    /** @test */
    public function validate_when_name_is_less_than_3_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['name' => str_repeat('a', 2)]);
    }

    /** @test */
    public function validate_when_name_is_more_than_than_100_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['name' => str_repeat('a', 101)]);
    }

    /** @test */
    public function validate_when_nip_is_less_than_3_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['nip' => str_repeat('a', 2)]);
    }

    /** @test */
    public function validate_when_nip_is_more_than_50_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['nip' => str_repeat('a', 51)]);
    }

    /** @test */
    public function validate_when_phone_number_is_less_than_8_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['phone_number' => str_repeat('a', 7)]);
    }

    /** @test */
    public function validate_when_nip_is_more_than_than_50_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['nip' => str_repeat('a', 51)]);
    }

    /** @test */
    public function validate_when_email_is_empty()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['email' => '']);
    }

    /** @test */
    public function validate_when_email_is_less_than_5_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['email' => str_repeat('a', 4)]);
    }

    /** @test */
    public function validate_when_email_is_more_than_than_50_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['email' => str_repeat('a', 51)]);
    }

    /** @test */
    public function validate_when_email_is_not_valid_format()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['email' => 'asd5123']);
    }

    /** @test */
    public function validate_when_email_is_duplicate()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['email' => User::first()->email]);
    }

    /** @test */
    public function validate_when_password_is_empty()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['password' => '']);
    }

    /** @test */
    public function validate_when_password_is_less_than_6_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['password' => str_repeat('a', 5)]);
    }

    /** @test */
    public function validate_when_password_is_more_than_than_50_char()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['password' => str_repeat('a', 51)]);
    }

    /** @test */
    public function validate_when_level_id_is_empty()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['level_id' => '']);
    }

    /** @test */
    public function validate_when_level_id_is_not_valid_case_1()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['level_id' => (Level::all('id')->first()->id - 1)]);
    }

    /** @test */
    public function validate_when_level_id_is_not_valid_case_2()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['level_id' => (Level::all('id')->last()->id + 1)]);
    }

    /** @test */
    public function validate_when_department_id_is_not_valid_case_1()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['department_id' => (Department::all('id')->first()->id - 1)]);
    }

    /** @test */
    public function validate_when_department_id_is_not_valid_case_2()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $this->checkDataIsInvalid($this->adminUser(), ['department_id' => (Department::all('id')->last()->id + 1)]);
    }

    /** @test */
    public function edit_can_accessed()
    {
        $user = $this->adminUser();

        $response = $this->actingAs($user)->get(route('admin.setting.user.edit', User::all()->last()->id));

        $response->assertStatus(200);
    }

    /** @test */
    public function edit_cant_accessed_if_selected_id_is_not_valid()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $user = $this->adminUser();

        $response = $this->actingAs($user)->get(route('admin.setting.user.edit', (User::all()->last()->id + 1)));

        $response->assertStatus(404);
    }

    /** @test */
    public function destroy_can_performed()
    {
        // Remove code bellow if code is complete
        $this->markTestSkipped('Skipped');

        $user = $this->adminUser();
        $deleted_user = User::all()->last();
        $response = $this->actingAs($user)->delete(route('admin.setting.user.destroy', $deleted_user->id));

        $response->assertRedirect(route('admin.setting.user.index'));
        $this->assertDatabaseCount('users', 15);
        $this->assertDatabaseMissing('users', $deleted_user);
    }



    // STATIC DATA SECTION
    public function adminUser()
    {
        return User::whereHas('level', function ($query) {
            return $query->where('name', 'Admin');
        })->first();
    }

    public function validUserData()
    {
        $level = Level::where('name', 'Anggota')->first();
        $department = Department::where('name', 'Sub-Department IPTEK-B')->first();

        return [
            'nip' => 'A11.2017.10810',
            'name' => 'Fajar Heru Maulana',
            'phone_number' => '082225210125',
            'email' => 'fajar@hmti.com',
            'password' => '123123',
            'level_id' => $level->id,
            'department_id' => $department->id,
        ];
    }

    public function checkDataIsInvalid($user, $data)
    {
        // $this->withoutExceptionHandling();
        $response = $this->actingAs($user)->post(route('admin.setting.user.store', array_merge($this->validUserData(), $data)));
        $response->assertSessionHasErrors(array_key_first($data));
        $this->assertDatabaseCount('users', 16);
    }
}
