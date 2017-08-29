<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnClassIdToGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::table('grades', function ($table) {
             $table->integer('class_id')->after('lesson_id');
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
