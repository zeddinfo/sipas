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
            'same_as_id' => 1
        ]);

        Level::create([
            'name' => 'Ketua Umum',
            'same_as_id' => 2
        ]);

        Level::create([
            'name' => 'Asisten Ketua Umum',
            'same_as_id' => 2
        ]);

        Level::create([
            'name' => 'Sekretaris',
            'same_as_id' => 3
        ]);

        Level::create([
            'name' => 'Kepala Bidang Iptek',
            'same_as_id' => 4
        ]);

        Level::create([
            'name' => 'Kepala Department A',
            'same_as_id' => 5
        ]);

        Level::create([
            'name' => 'Kepala Department B',
            'same_as_id' => 6
        ]);

        Level::create([
            'name' => 'Anggota',
            'same_as_id' => 7
        ]);

        Level::create([
            'name' => 'Kepala TU',
            'same_as_id' => 9
        ]);
    }
}
