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
            'type' => 'OUT',
            'directory_code' => "",
            'code' => "",
            'title' => 'Surat Undangan Alumni',
            'instance' => "Pemerintah Out",
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        Mail::create([
            'type' => 'IN',
            'directory_code' => $faker->bothify('???/???/####/##/##'),
            'code' => $faker->bothify('???/???/####/##/##'),
            'title' => 'Surat Undangan Rapat PCP',
            'instance' => "Pemerintah In",
            'mail_created_at' => Carbon::now()->format('Y-m-d'),
        ]);
    }
}
