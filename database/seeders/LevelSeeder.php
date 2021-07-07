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
            'name' => 'Kepala Bidang',
            'same_as_id' => 4
        ]);

        Level::create([
            'name' => 'Kepala Department',
            'same_as_id' => 5
        ]);

        Level::create([
            'name' => 'Anggota Department',
            'same_as_id' => 6
        ]);
    }
}
