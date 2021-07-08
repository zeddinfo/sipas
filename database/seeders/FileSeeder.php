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
                'original_name' => "dokumen.png",
                'directory_name' => "https://designshack.net/wp-content/uploads/placeholder-image.png",
            ]);
        }
    }
}
