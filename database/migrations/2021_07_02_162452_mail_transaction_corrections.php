<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailTransactionCorrections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_transactions_correction', function (Blueprint $table) {
            $table->id();
            $table->$table->foreignId('mail_transaction_id')->references('id')->on('mail_transactions')->nullOnDelete();
            $table->longText('note');
            $table->foreignId('file_id')->references('id')->on('files')->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
