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
        // 1
        Department::create([
            'name' => 'Umum, Kepegawaian Dan Informasi',
        ]);

        // 2
        Department::create([
            'name' => 'Perencanaan Dan Keuangan',
        ]);

        // 3
        Department::create([
            'name' => 'Pencegahan Dan Pengendalian Penyakit',
        ]);

        // 4
        Department::create([
            'name' => 'Kesehatan Masyarakat',
        ]);

        // 5
        Department::create([
            'name' => 'Pelayanan Dan Sumber Daya Kesehatan',
        ]);

        // Seksie P2
        Department::create([
            'name' => 'Pencegahan & Pengendalian Penyakit Menular',
            'depends_on_id' => 3,
        ]);

        Department::create([
            'name' => 'Surveilans dan Imunisasi',
            'depends_on_id' => 3,
        ]);

        Department::create([
            'name' => 'Pencegahan & Pengendalian PTM',
            'depends_on_id' => 3,
        ]);

        // Seksie KESMAS
        Department::create([
            'name' => 'Kesling, Kesehatan Kerja dan Kesehatan Olahraga',
            'depends_on_id' => 4,
        ]);

        Department::create([
            'name' => 'Promosi & Pemberdayaan Masyarakat',
            'depends_on_id' => 4,
        ]);

        Department::create([
            'name' => 'Kesehatan Keluarga KIA & Gizi',
            'depends_on_id' => 4,
        ]);


        // Seksie YANKES
        Department::create([
            'name' => 'Kefarmasian Dan Alkes',
            'depends_on_id' => 5,
        ]);

        Department::create([
            'name' => 'SDM Kesehatan',
            'depends_on_id' => 5,
        ]);

        Department::create([
            'name' => 'Pelayanan Kesehatan',
            'depends_on_id' => 5,
        ]);
    }
}
