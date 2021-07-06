<?php

namespace Database\Seeders;

use App\Models\Mail;
use App\Models\MailAttribute;
use App\Models\MailAttributeTransaction;
use Illuminate\Database\Seeder;

class MailAttributeTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Mail::all();
        $mail_attr_id = MailAttribute::all(['id'])->toArray();
        // dd($mail_attr_id[0]['id']);
        $i = 0;
        for ($i = 0; $i < count($data) - 1; $i++) {
            MailAttributeTransaction::create([
                'mail_id' => $data[$i]->id,
                'mail_attribute_id' => $mail_attr_id[$i]['id'],
                'type' => $data[$i]->kind
            ]);
        }
    }
}
