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
        Schema::create('mail_transaction_corrections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('mail_transaction_id')->constrained('mail_transactions');
            $table->foreignId('file_id')->nullable()->constrained('files');
            $table->string('note');
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
