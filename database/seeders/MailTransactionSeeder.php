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
                    $query->where('name', Level::LEVEL_ANGGOTA);
                })
                ->whereHas('department', function ($query) {
                    $query->where('name', "Software");
                })
                ->first()->id,

            'target_user_id' => User::query()
                ->whereHas('level', function ($query) {
                    $query->where('name', Level::LEVEL_KADEP);
                })
                ->whereHas('department', function ($query) {
                    $query->where('name', "Software");
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
                    $query->where('name', Level::LEVEL_KETUM);
                })->first()->id,

            'type' => 'FORWARD',
        ]);
    }
}
