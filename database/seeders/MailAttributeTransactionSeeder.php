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
        $mails = Mail::all();
        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        foreach ($mails as $mail) {
            foreach ($mail_attribute_types as $mail_attribute_type) {
                $mail_attribute_transaction = new MailAttributeTransaction();
                $mail_attribute_transaction->mail_id = $mail->id;
                $mail_attribute = MailAttribute::where('type', $mail_attribute_type->type)->get()[rand(0, 2)];
                $mail_attribute_transaction->mail_attribute_id = $mail_attribute->id;
                $mail_attribute_transaction->save();
            }
        }
    }
}
