<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Mail;
use App\Models\MailVersion;
use Illuminate\Database\Seeder;

class MailVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Mail::get();
        $file = File::get(['id'])->toArray();
        $i = 0;
        foreach ($data as $r) {
            MailVersion::create([
                'mail_id' => $r->id,
                'file_id' => $file[$i]['id']
            ]);
        };
    }
}
