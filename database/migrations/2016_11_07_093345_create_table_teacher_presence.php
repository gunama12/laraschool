<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeacherPresence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('teacher_presences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id');
            $table->integer('year_id');
            $table->date('date');
            $table->enum('status', ['alpha', 'sick', 'permit']);
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
        Schema::drop('teacher_presences');
    }
}
