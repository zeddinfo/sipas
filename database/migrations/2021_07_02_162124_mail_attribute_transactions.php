<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailAttributeTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_attribute_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('mail_id')->references('id')->on('mails');
            $table->foreignId('mail_attribute_id')->references('id')->on('mail_attributes');
            $table->string('type');
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
