<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['IN', 'OUT']);
            $table->string('code')->nullable();
            $table->string('title');
            $table->string('instance');
            $table->text('note')->nullable();
            $table->dateTime('mail_created_at')->nullable();
            $table->dateTime('mail_received_at')->nullable();
            $table->dateTime('archived_at')->nullable();
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
