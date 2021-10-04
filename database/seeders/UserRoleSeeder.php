<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Level;
use App\Models\UserRole;
use App\Models\Department;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //!! Admin
        UserRole::create([
            'user_id' => 1,
            'level_id' => Level::where('name', Level::LEVEL_ADMIN)->first()->id,
            'active' => true
        ]);

        //!! TU
        UserRole::create([
            'user_id' => 2,
            'level_id' => Level::where('name', Level::LEVEL_TU)->first()->id,
            'active' => true
        ]);

        //!! Kepala Dinas
        UserRole::create([
            'user_id' => 3,
            'level_id' => Level::where('name', Level::LEVEL_KADIS)->first()->id,
            'active' => true
        ]);

        //!! Sekretaris
        UserRole::create([
            'user_id' => 4,
            'level_id' => Level::where('name', Level::LEVEL_SEKRETARIS)->first()->id,
            'active' => true
        ]);

        //!! KASUBBAG, KABID, KASIE, STAFF SUBBAG, STAFF SEKSIE
        $subbag_department_ids = [1, 2];
        $bidang_department_ids = [3, 4, 5];
        $seksie_department_ids = [6, 7, 8, 9, 10, 11, 12, 13, 14];

        $departments = Department::all();

        $user_id_counter = 5;

        foreach ($departments as $department) {
            if (in_array($department->id, $subbag_department_ids)) {
                UserRole::create([
                    'user_id' => $user_id_counter,
                    'level_id' => Level::where('name', Level::LEVEL_KASUBBAG)->first()->id,
                    'department_id' => $department->id,
                    'active' => true
                ]);
                if ($department->name == 'Umum, Kepegawaian Dan Informasi') {
                    UserRole::create([
                        'user_id' => $user_id_counter,
                        'level_id' => Level::where('name', Level::LEVEL_TU)->first()->id,
                        'active' => false
                    ]);
                }
                $user_id_counter++;
            } elseif (in_array($department->id, $bidang_department_ids)) {
                UserRole::create([
                    'user_id' => $user_id_counter,
                    'level_id' => Level::where('name', Level::LEVEL_KABID)->first()->id,
                    'department_id' => $department->id,
                    'active' => true
                ]);
                $user_id_counter++;
            } elseif (in_array($department->id, $seksie_department_ids)) {
                UserRole::create([
                    'user_id' => $user_id_counter,
                    'level_id' => Level::where('name', Level::LEVEL_KASIE)->first()->id,
                    'department_id' => $department->id,
                    'active' => true
                ]);
                $user_id_counter++;
            }
        }

        foreach ($departments as $department) {
            if (in_array($department->id, $subbag_department_ids)) {
                UserRole::create([
                    'user_id' => $user_id_counter,
                    'level_id' => Level::where('name', Level::LEVEL_STAF_SUBBAG)->first()->id,
                    'department_id' => $department->id,
                    'active' => true
                ]);
                if ($department->name == 'Umum, Kepegawaian Dan Informasi') {
                    UserRole::create([
                        'user_id' => $user_id_counter,
                        'level_id' => Level::where('name', Level::LEVEL_TU)->first()->id,
                        'active' => false
                    ]);
                }
                $user_id_counter++;
            } elseif (in_array($department->id, $seksie_department_ids)) {
                UserRole::create([
                    'user_id' => $user_id_counter,
                    'level_id' => Level::where('name', Level::LEVEL_STAF_SEKSIE)->first()->id,
                    'department_id' => $department->id,
                    'active' => true
                ]);
                $user_id_counter++;
            }
        }
    }
}
