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
            $table->bigIncrements('id');
            $table->foreignId('mail_version_id')->constrained('mail_versions');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('target_user_id')->constrained('users');
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
