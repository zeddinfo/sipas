<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nip' => '000001',
            'name' => 'Admin',
            'phone_number' => '0818181221',
            'email' => 'admin@tsel.com',
            'password' => Hash::make('123123'),
            'level_id' => 1,
            'department_id' => 1,
        ]);

        User::create([
            'nip' => '000002',
            'name' => 'Kepala Dinas',
            'phone_number' => '0818181222',
            'email' => 'kepaladinas@tsel.com',
            'password' => Hash::make('123123'),
            'level_id' => 2,
            'department_id' => 1,
        ]);

        User::create([
            'nip' => '000003',
            'name' => 'Sekretaris',
            'phone_number' => '0818181223',
            'email' => 'sekretaris@tsel.com',
            'password' => Hash::make('123123'),
            'level_id' => 3,
            'department_id' => 1,
        ]);

        User::create([
            'nip' => '000004',
            'name' => 'Kepala TU',
            'phone_number' => '0818181224',
            'email' => 'kepalatu@tsel.com',
            'password' => Hash::make('123123'),
            'level_id' => 5,
            'department_id' => 1,
        ]);
    }
}
