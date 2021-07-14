<?php

namespace Tests\Feature\Administration;

use App\Models\MailAttribute;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailOutFinalTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /** @test */
    public function unauthorized_user_cant_edit()
    {
        $response = $this->actingAs($this->user())->get(route('tu.mail.out.final.edit', 1));

        $response->assertNotFound();
    }

    /** @test */
    public function authorized_user_cant_edit()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->tuUser())->get(route('tu.mail.out.final.edit', 1));
        $response->assertOk();
    }

    /** @test */
    public function authorized_user_can_update()
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->tuUser())->patch(route('tu.mail.out.final.update', 1), $this->validData());

        $response->assertOk();

        $this->assertDatabaseCount('mails', 2);
        $this->assertDatabaseHas('mails', [
            'type' => 'OUT',
            'code' => 'A11.2017.10810',
            'directory_code' => 'A11.2017',
        ]);
    }

    /** @test */
    public function authorized_user_can_update_wihtout_directory_code()
    {
        $data_without_directory_code = $this->validData();
        unset($data_without_directory_code['directory_code']);

        $response = $this->actingAs($this->tuUser())->patch(route('tu.mail.out.final.update', 1), $data_without_directory_code);

        $response->assertOk();

        $this->assertDatabaseCount('mails', 2);
        $this->assertDatabaseHas('mails', [
            'type' => 'OUT',
            'code' => 'A11.2017.10810',
            'directory_code' => '',
        ]);
    }

    // STATIC DATA
    public function user()
    {
        return User::find(10);
    }

    public function tuUser()
    {
        return User::find(2);
    }

    public function validData()
    {

        return [
            'code' => 'A11.2017.10810',
            'directory_code' => 'A11.2017',
            'mail_attributes' =>  MailAttribute::where('type', 'Folder')->get()->pluck('id'),
        ];
    }
}
