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
            'depend_on_id' => 1,
        ]);

        Department::create([
            'name' => 'Penelitian dan Pengembangan SDM',
            'depend_on_id' => 2,
        ]);

        Department::create([
            'name' => 'Informasi dan Komunikasi',
            'depend_on_id' => 3,
        ]);
    }
}
