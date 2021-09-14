<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Level;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        //!! ADMIN
        User::create([
            'nip' => $faker->creditCardNumber,
            'name' => 'Admin',
            'phone_number' => '082358969611',
            'email' => 'admin@dinkesmelawi.com',
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', Level::LEVEL_ADMIN)->first()->id,
        ]);

        //!! TU
        User::create([
            'nip' => $faker->creditCardNumber,
            'name' => $faker->name,
            'phone_number' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', Level::LEVEL_TU)->first()->id,
        ]);

        //!! KADIS
        User::create([
            'nip' => $faker->creditCardNumber,
            'name' => $faker->name,
            'phone_number' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', Level::LEVEL_KADIS)->first()->id,
        ]);

        //!! SEKRETARIS
        User::create([
            'nip' => $faker->creditCardNumber,
            'name' => $faker->name,
            'phone_number' => $faker->phoneNumber,
            'email' => $faker->email,
            'password' => Hash::make('123123'),
            'level_id' => Level::where('name', Level::LEVEL_SEKRETARIS)->first()->id,
        ]);

        //!! KASUBBAG, KABID, KASIE, STAFF SUBBAG, STAFF SEKSIE
        $subbag_department_ids = [1, 2];
        $bidang_department_ids = [3, 4, 5];
        $seksie_department_ids = [6, 7, 8, 9, 10, 11, 12, 13, 14];

        $departments = Department::all();

        foreach ($departments as $department) {
            if (in_array($department->id, $subbag_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
                    'level_id' => Level::where('name', Level::LEVEL_KASUBBAG)->first()->id,
                    'department_id' => Department::where('name', $department->name)->first()->id,
                ]);
            } elseif (in_array($department->id, $bidang_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
                    'level_id' => Level::where('name', Level::LEVEL_KABID)->first()->id,
                    'department_id' => Department::where('name', $department->name)->first()->id,
                ]);
            } elseif (in_array($department->id, $seksie_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
                    'level_id' => Level::where('name', Level::LEVEL_KASIE)->first()->id,
                    'department_id' => Department::where('name', $department->name)->first()->id,
                ]);
            }
        }

        foreach ($departments as $department) {
            if (in_array($department->id, $subbag_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
                    'level_id' => Level::where('name', Level::LEVEL_STAF_SUBBAG)->first()->id,
                    'department_id' => Department::where('name', $department->name)->first()->id,
                ]);
            } elseif (in_array($department->id, $seksie_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
                    'level_id' => Level::where('name', Level::LEVEL_STAF_SEKSIE)->first()->id,
                    'department_id' => Department::where('name', $department->name)->first()->id,
                ]);
            }
        }
    }
}
