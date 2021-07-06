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
        $data = ['priority', 'reference', 'type'];
        foreach ($data as $key => $value) {
            MailAttribute::create([
                'type' => $value,
            ]);
        }
    }
}
