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
            'name' => 'admin',
            'same_as_id' => 1
        ]);

        Level::create([
            'name' => 'sekretaris',
            'same_as_id' => 2
        ]);

        Level::create([
            'name' => 'kepala_dinas',
            'same_as_id' => 3
        ]);

        Level::create([
            'name' => 'kepala_tu',
            'same_as_id' => 4
        ]);
    }
}
