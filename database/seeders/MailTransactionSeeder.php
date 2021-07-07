<?php

namespace Database\Seeders;

use App\Models\Mail;
use App\Models\MailTransaction;
use App\Models\MailVersion;
use App\Models\User;
use Illuminate\Database\Seeder;

class MailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailTransaction::create([
            'mail_version_id' => 2,
            'user_id' =>  8,
            'target_user_id' => 6,
            'type' => 'FORWARD',
        ]);

        MailTransaction::create([
            'mail_version_id' => 1,
            'user_id' =>  16,
            'target_user_id' => 4,
            'type' => 'FORWARD',
        ]);
    }
}
