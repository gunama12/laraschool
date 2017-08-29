<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudentPresece extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_presences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('year_id');
            $table->integer('class_id');
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
          Schema::drop('student_presences');
    }
}
