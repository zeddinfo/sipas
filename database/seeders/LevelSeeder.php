<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Mail;
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
            'name' => Level::LEVEL_ADMIN,
        ]);

        Level::create([
            'name' => Level::LEVEL_TU,
        ]);

        Level::create([
            'name' => Level::LEVEL_KETUM,
        ]);

        Level::create([
            'name' => 'Asisten ' . Level::LEVEL_TU,
            'same_as_id' => 2
        ]);

        Level::create([
            'name' => 'Asisten ' . Level::LEVEL_KETUM,
            'same_as_id' => 3
        ]);

        Level::create([
            'name' => Level::LEVEL_SEKRETARIS,
        ]);

        Level::create([
            'name' => Level::LEVEL_KABID,
        ]);

        Level::create([
            'name' => Level::LEVEL_KADEP,
        ]);

        Level::create([
            'name' => 'Asisten ' . Level::LEVEL_KADEP,
            'same_as_id' => 8
        ]);

        Level::create([
            'name' => Level::LEVEL_ANGGOTA,
        ]);
    }
}
