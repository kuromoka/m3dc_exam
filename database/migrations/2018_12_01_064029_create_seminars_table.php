<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('crnt_date');
            $table->string('todohuken', 50);
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->integer('viewcnt');
            $table->string('ip_addr', 30);
            $table->string('referer', 200);
            $table->string('usr_agent', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seminars');
    }
}
