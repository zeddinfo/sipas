<?php

namespace Database\Seeders;

use App\Models\MailAttribute;
use Illuminate\Database\Seeder;

class MailAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailAttribute::create([
            "type" => 'Permohonan',
            'name' => 'PERMOHONAN',
            "code" => 'PRMHN',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Pemberitahuan',
            'name' => 'PEBERITAHUAN',
            "code" => 'PBRTHN',
            "color" => '#ffd500',
        ]);

        MailAttribute::create([
            "type" => 'Keterangan',
            'name' => 'KETERANGAN',
            "code" => 'KTRGN',
            "color" => '#1bcfb4',
        ]);

        MailAttribute::create([
            "type" => 'Undanga',
            'name' => 'UNDANGAN',
            "code" => 'UNDGN',
            "color" => '#c3bdbd',
        ]);
    }
}
