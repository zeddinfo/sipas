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
            'name' => 'Ilmu Pengetahuan dan Teknologi',
        ]);

        Department::create([
            'name' => 'Penelitian dan Pengembangan SDM',
        ]);

        Department::create([
            'name' => 'Informasi dan Komunikasi',
        ]);

        Department::create([
            'name' => 'Software',
            'depend_on_id' => 1,
        ]);

        Department::create([
            'name' => 'Hardware',
            'depend_on_id' => 1,
        ]);
        Department::create([
            'name' => 'Kastra',
            'depend_on_id' => 2,
        ]);

        Department::create([
            'name' => 'Pengkaderan',
            'depend_on_id' => 2,
        ]);

        Department::create([
            'name' => 'Humas',
            'depend_on_id' => 3,
        ]);
        Department::create([
            'name' => 'BC',
            'depend_on_id' => 3,
        ]);
    }
}
