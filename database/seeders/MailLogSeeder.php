<?php

namespace Database\Seeders;

use App\Models\MailLog;
use Illuminate\Database\Seeder;

class MailLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailLog::create([
            'mail_id' => 1,
            'log' => 'Dibuat',
            'user_name' => 'Apria Nur Huda',
            'user_level_department' => 'Anggota Software',
        ]);

        MailLog::create([
            'mail_id' => 1,
            'log' => 'Diteruskan',
            'user_name' => 'Apria Nur Huda',
            'user_level_department' => 'Anggota Software',
            'target_user_name' => 'Adis Wing Kasenda',
            'target_user_level_department' => 'Kepala Departemen Software',
        ]);

        MailLog::create([
            'mail_id' => 2,
            'log' => 'Dibuat',
            'user_name' => 'TU',
            'user_level_department' => 'TU',
        ]);

        MailLog::create([
            'mail_id' => 2,
            'log' => 'Diteruskan',
            'user_name' => 'TU',
            'user_level_department' => 'TU',
            'target_user_name' => 'Auliail Maknun',
            'target_user_level_department' => 'Sekretaris',
        ]);
    }
}
