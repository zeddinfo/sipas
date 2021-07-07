<?php

namespace Database\Seeders;

use App\Models\MailTransactionLog;
use Illuminate\Database\Seeder;

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
            'username' => 'kepala_tu',
        ]);

        MailTransactionLog::create([
            'mail_transaction_id' => 1,
            'log' => 'diteruskan',
            'user_level_department' => 4,
            'username' => 'sekretaris',
        ]);

        MailTransactionLog::create([
            'mail_transaction_id' => 2,
            'log' => 'dibuat',
            'user_level_department' => 8,
            'username' => 'kadepipteka',
        ]);

        MailTransactionLog::create([
            'mail_transaction_id' => 2,
            'log' => 'diteruskan',
            'user_level_department' => 6,
            'username' => 'kabidiptek',
        ]);
    }
}
