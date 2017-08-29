<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('lesson_id');
            $table->integer('year_id');
            $table->integer('grade');
            $table->boolean('status');
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
        Schema::drop('grades');
    }
}
