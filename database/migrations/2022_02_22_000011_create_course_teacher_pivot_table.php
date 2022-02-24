<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTeacherPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_teacher', function (Blueprint $table) {

        	$table->increments('id');
        	
            $table->unsignedInteger('course_id');

            $table->foreign('course_id', 'course_id_fk_538846')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedInteger('teacher_id');

            $table->foreign('teacher_id', 'teacher_id_fk_538846')->references('id')->on('teachers')->onDelete('cascade');
        });
    }
}
