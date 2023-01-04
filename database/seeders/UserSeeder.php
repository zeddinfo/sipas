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
            'phone_number' => $faker->phoneNumber,
            'email' => 'admin@uici.ac.id',
            'password' => Hash::make('123123'),
        ]);

        //!! TU
        User::create([
            'nip' => $faker->creditCardNumber,
            'name' => 'Admin Surat',
            'phone_number' => $faker->phoneNumber,
            'email' => 'adminsurat@uici.ac.id',
            'password' => Hash::make('123123'),
        ]);

        //!! KADIS
        User::create([
            'nip' => $faker->creditCardNumber,
            'name' => 'Kadis',
            'phone_number' => $faker->phoneNumber,
            'email' => 'kadis@uici.ac.id',
            'password' => Hash::make('123123'),
        ]);

        //!! SEKRETARIS
        User::create([
            'nip' => $faker->creditCardNumber,
            'name' => 'Sekretaris UICI',
            'phone_number' => $faker->phoneNumber,
            'email' => 'sekretaris@uici.ac.id',
            'password' => Hash::make('123123'),
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
                ]);
            } elseif (in_array($department->id, $bidang_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
                ]);
            } elseif (in_array($department->id, $seksie_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
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
                ]);
            } elseif (in_array($department->id, $seksie_department_ids)) {
                User::create([
                    'nip' => $faker->creditCardNumber,
                    'name' => $faker->name,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'password' => Hash::make('123123'),
                ]);
            }
        }
    }
}
