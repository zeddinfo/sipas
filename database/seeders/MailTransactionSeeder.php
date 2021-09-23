<?php

namespace Database\Seeders;

use App\Models\Level;
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
            'mail_version_id' => 1,

            'user_id' =>  User::query()
                ->whereHas('level', function ($query) {
                    $query->where('name', Level::LEVEL_STAF_SEKSIE);
                })
                ->whereHas('department', function ($query) {
                    $query->where('name', "SDM Kesehatan");
                })
                ->first()->id,

            'target_user_id' => User::query()
                ->whereHas('level', function ($query) {
                    $query->where('name', Level::LEVEL_KASIE);
                })
                ->whereHas('department', function ($query) {
                    $query->where('name', "SDM Kesehatan");
                })
                ->first()->id,

            'type' => 'FORWARD',
        ]);

        MailTransaction::create([
            'mail_version_id' => 2,

            'user_id' => User::query()
                ->whereHas('level', function ($query) {
                    $query->where('name', Level::LEVEL_TU);
                })->first()->id,

            'target_user_id' => User::query()
                ->whereHas('level', function ($query) {
                    $query->where('name', Level::LEVEL_SEKRETARIS);
                })->first()->id,

            'type' => 'FORWARD',
        ]);
    }
}
