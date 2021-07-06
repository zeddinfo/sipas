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
        $data = MailVersion::all();
        $user = User::all(['id'])->toArray();

        $i = 0;
        foreach ($data as $r) {
            MailTransaction::create([
                'mail_version_id' => $r->id,
                'user_id' => $user[$i]['id'],
                'target_user_id' => $user[$i]['id'],
                'type' => '',
            ]);
        }
    }
}
