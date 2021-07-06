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
            'name' => 'kepala_bidang_iptek',
            'same_as_id' => 3
        ]);

        Level::create([
            'name' => 'kepala_bidang_litbang',
            'same_as_id' => 4
        ]);

        Level::create([
            'name' => 'kepala_bidang_infokom',
            'same_as_id' => 5
        ]);
    }
}
