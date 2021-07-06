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
            'kind' => 'out',
            'directory_code' => $faker->bothify('???/???/####/##/##'),
            'code' => $faker->bothify('???/???/####/##/##'),
            'title' => 'Surat Undangan Kaprogdi',
            'archived_at' => Carbon::now()->format('Y-m-d'),
            'origin' => $faker->imageUrl($width = 640, $height = 480),
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        Mail::create([
            'kind' => 'out',
            'directory_code' => $faker->bothify('???/???/####/##/##'),
            'code' => $faker->bothify('???/???/####/##/##'),
            'title' => 'Surat Undangan Kemahasiswaaan',
            'archived_at' => Carbon::now()->format('Y-m-d'),
            'origin' => $faker->imageUrl($width = 640, $height = 480),
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        Mail::create([
            'kind' => 'out',
            'directory_code' => $faker->bothify('???/???/####/##/##'),
            'code' => $faker->bothify('???/???/####/##/##'),
            'title' => 'Surat Undangan Alumni',
            'archived_at' => Carbon::now()->format('Y-m-d'),
            'origin' => $faker->imageUrl($width = 640, $height = 480),
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        Mail::create([
            'kind' => 'in',
            'directory_code' => $faker->bothify('???/???/####/##/##'),
            'code' => $faker->bothify('???/???/####/##/##'),
            'title' => 'Surat Undangan Rapat PCP',
            'archived_at' => Carbon::now()->format('Y-m-d'),
            'origin' => $faker->imageUrl($width = 640, $height = 480),
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);
    }
}
