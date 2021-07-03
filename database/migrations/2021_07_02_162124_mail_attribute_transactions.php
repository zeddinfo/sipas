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
            $table->foreignId('mail_id')->references('id')->on('mails')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mail_attributes_id')->references('id')->on('mail_attributes')->onUpdate('cascade')->onDelete('cascade');
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
