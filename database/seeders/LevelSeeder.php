<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Admin',

        ]);

        Level::create([
            'name' => 'TU',

        ]);

        Level::create([
            'name' => 'Ketua Umum',

        ]);

        Level::create([
            'name' => 'Asisten Ketua Umum',
            'same_as_id' => 2
        ]);

        Level::create([
            'name' => 'Sekretaris',

        ]);

        Level::create([
            'name' => 'Kepala Bidang',

        ]);

        Level::create([
            'name' => 'Kepala Departemen',

        ]);

        Level::create([
            'name' => 'Anggota Departemen',

        ]);
    }
}
