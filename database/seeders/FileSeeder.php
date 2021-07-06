<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Mail;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mails = Mail::all();

        foreach ($mails as $r) {
            File::create([
                'original_name' => $r->title,
                'directory_name' => $r->origin,
                'type' => $r->id,
            ]);
        }
    }
}
