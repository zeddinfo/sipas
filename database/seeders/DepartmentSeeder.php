<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Department Software',
            'depend_on_id' => 1,
        ]);

        Department::create([
            'name' => 'Department Hardware',
            'depend_on_id' => 1,
        ]);

        Department::create([
            'name' => 'Department Pengkaderan',
            'depend_on_id' => 2,
        ]);

        Department::create([
            'name' => 'Department Kastra',
            'depend_on_id' => 2,
        ]);

        Department::create([
            'name' => 'Media Informasi',
            'depend_on_id' => 3,
        ]);
        Department::create([
            'name' => 'Humas',
            'depend_on_id' => 3,
        ]);
    }
}
