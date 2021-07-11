<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailTransactionLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_transaction_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('mail_transaction_id')->constrained('mail_transactions');
            $table->string('log');
            $table->string('user_name');
            $table->string('user_level_department')->nullable();
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
