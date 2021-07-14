<?php

namespace Database\Seeders;

use App\Models\MailTransactionLog;
use Illuminate\Database\Seeder;
use MailTransactionLogs;

class MailTransactionLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailTransactionLog::create([
            'mail_transaction_id' => 1,
            'log' => 'dibuat',
            'user_level_department' => 16,
            'user_name' => 'kepala_tu',
        ]);

        MailTransactionLog::create([
            'mail_transaction_id' => 1,
            'log' => 'diteruskan',
            'user_level_department' => 4,
            'user_name' => 'sekretaris',
        ]);

        MailTransactionLog::create([
            'mail_transaction_id' => 2,
            'log' => 'dibuat',
            'user_level_department' => 8,
            'user_name' => 'kadepipteka',
        ]);

        MailTransactionLog::create([
            'mail_transaction_id' => 2,
            'log' => 'diteruskan',
            'user_level_department' => 6,
            'user_name' => 'kabidiptek',
        ]);

        MailTransactionLog::create([
            'mail_transaction_id' => 2,
            'log' => "Diteruskan oleh ",
            'user_name' => 'TU',
            'user_level_department' => 2
        ]);
    }
}
