<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip');
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('password');
            $table->foreignId('levels_id')->references('id')->on('levels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
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
