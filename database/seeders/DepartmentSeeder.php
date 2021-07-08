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
            'depends_on_id' => 1,
        ]);

        Department::create([
            'name' => 'Hardware',
            'depends_on_id' => 1,
        ]);
        Department::create([
            'name' => 'Kastra',
            'depends_on_id' => 2,
        ]);

        Department::create([
            'name' => 'Pengkaderan',
            'depends_on_id' => 2,
        ]);

        Department::create([
            'name' => 'Humas',
            'depends_on_id' => 3,
        ]);
        Department::create([
            'name' => 'BC',
            'depends_on_id' => 3,
        ]);
    }
}
