<?php

namespace Database\Seeders;

use App\Models\Mail;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        Mail::create([
            'type' => 'out',
            'directory_code' => $faker->bothify('???/???/####/##/##'),
            'code' => $faker->bothify('???/???/####/##/##'),
            'title' => 'Surat Undangan Alumni',
            'origin' => $faker->imageUrl($width = 640, $height = 480),
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        Mail::create([
            'type' => 'in',
            'directory_code' => $faker->bothify('???/???/####/##/##'),
            'code' => $faker->bothify('???/???/####/##/##'),
            'title' => 'Surat Undangan Rapat PCP',
            'origin' => $faker->imageUrl($width = 640, $height = 480),
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);
    }
}
