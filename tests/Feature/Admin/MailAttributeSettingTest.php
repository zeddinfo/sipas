<?php

namespace Tests\Feature\Admin;

use App\Models\Level;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailAttributeSettingTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function unauthorized_user_cant_access_feature()
    {
        $response = $this->actingAs($this->normalUser())->get(route('admin.setting.mail.attribute.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function unauthorized_tu_user_cant_access_feature()
    {
        $response = $this->actingAs($this->tuUser())->get(route('admin.setting.mail.attribute.index'));

        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_can_access_index()
    {
        $response = $this->actingAs($this->adminUser())->get(route('admin.setting.mail.attribute.index'));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_access_show()
    {
        $response = $this->actingAs($this->adminUser())->get(route('admin.setting.mail.attribute.show', 1));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_access_create()
    {
        $response = $this->actingAs($this->adminUser())->get(route('admin.setting.mail.attribute.create'));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_store_mail_attribute()
    {
        $response = $this->actingAs($this->adminUser())->post(route('admin.setting.mail.attribute.store'), $this->validDataRequest());

        $response->assertOk();

        $this->assertDatabaseCount('mail_attributes', 11);
        $this->assertDatabaseHas('mail_attributes', [
            'type' => 'Tipe',
            'name' => 'Undangan',
            'code' => 'UDG',
            'color' => '#FCBA03'
        ]);
    }

    /** @test */
    public function admin_can_access_update()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->adminUser())->patch(route('admin.setting.mail.attribute.update', 1), $this->validDataRequest());

        $response->assertOk();

        $this->assertDatabaseCount('mail_attributes', 10);
        $this->assertDatabaseHas('mail_attributes', [
            'type' => 'Tipe',
            'name' => 'Undangan',
            'code' => 'UDG',
            'color' => '#FCBA03'
        ]);
    }

    /** @test */
    public function admin_can_delete_mail_attribute()
    {
        $response = $this->actingAs($this->adminUser())->delete(route('admin.setting.mail.attribute.destroy', 1));

        $response->assertOk();

        $this->assertSoftDeleted('mail_attributes', [
            'type' => 'Tipe',
            'name' => 'PERMOHONAN',
            'code' => 'PRMHN'
        ]);
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
            'type' => 'Tipe',
            'name' => 'Undangan',
            'code' => 'UDG',
            'color' => '#fcba03'
        ];
    }
}
