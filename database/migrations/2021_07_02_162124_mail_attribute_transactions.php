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
        Schema::create('mail_attribute_transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_id')->references('id')->on('mails')->nullOnDelete();
            $table->foreignId('mail_attribute_id')->references('id')->on('mail_attributes')->nullOnDelete();
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
