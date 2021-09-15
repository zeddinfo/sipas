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
            'name' => Level::LEVEL_KADIS,
        ]);

        Level::create([
            'name' => Level::LEVEL_SEKRETARIS,
        ]);

        Level::create([
            'name' => Level::LEVEL_KABID,
        ]);

        Level::create([
            'name' => Level::LEVEL_KASUBBAG,
        ]);

        Level::create([
            'name' => Level::LEVEL_KASIE,
        ]);

        Level::create([
            'name' => Level::LEVEL_STAF_SUBBAG,
        ]);

        Level::create([
            'name' => Level::LEVEL_STAF_SEKSIE,
        ]);
    }
}
