<?php

namespace Tests\Feature\Admin;

use App\Models\Level;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentSettingTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function unauthorized_user_cant_access_index()
    {
        $response = $this->actingAs($this->normalUser())->get(route('admin.setting.department.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function unauthorized_tu_user_cant_access_index()
    {
        $response = $this->actingAs($this->tuUser())->get(route('admin.setting.department.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_access_index()
    {
        $response = $this->actingAs($this->adminUser())->get(route('admin.setting.department.index'));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_access_show()
    {
        $response = $this->actingAs($this->adminUser())->get(route('admin.setting.department.show', 1));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_access_create()
    {
        $response = $this->actingAs($this->adminUser())->get(route('admin.setting.department.create'));

        $response->assertOk();
    }

    /** @test */
    public function admin_canperform__store()
    {
        $response = $this->actingAs($this->adminUser())->post(route('admin.setting.department.store'), $this->validDataRequest());

        $response->assertOk();

        $this->assertDatabaseCount('departments', 10);
        $this->assertDatabaseHas('departments', $this->validDataRequest());
    }

    /** @test */
    public function admin_can_access_edit()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->adminUser())->get(route('admin.setting.department.edit', 1));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_perform_update()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->adminUser())->patch(route('admin.setting.department.update', 1), $this->validDataRequest());

        $response->assertOk();

        $this->assertDatabaseCount('departments', 9);
        $this->assertDatabaseHas('departments', $this->validDataRequest());
    }

    /** @test */
    public function admin_can_perform_delete()
    {
        $this->actingAs($this->adminUser())->post(route('admin.setting.department.store'), $this->validDataRequest());
        $response = $this->actingAs($this->adminUser())->delete(route('admin.setting.department.destroy', 10));

        $response->assertOk();

        $this->assertSoftDeleted('departments', $this->validDataRequest());
    }


    // STATIC DATA
    public function adminUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_ADMIN);
        })->first();
    }

    public function normalUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_KABID);
        })->first();
    }

    public function tuUser()
    {
        return User::whereHas('level', function ($query) {
            $query->where('name', Level::LEVEL_TU);
        })->first();
    }

    public function validDataRequest()
    {
        return [
            'name' => 'IPTEK',
            'depends_on_id' => 7,
        ];
    }
}
