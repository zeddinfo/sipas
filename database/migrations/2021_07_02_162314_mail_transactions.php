<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mail_version_id')->references('id')->on('mail_versions')->nullOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreignId('target_user_id')->references('id')->on('users')->nullOnDelete();
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
