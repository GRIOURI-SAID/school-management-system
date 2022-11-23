<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->references('id')->on("students")->cascadeOnDelete();
            $table->foreignId("grade_id")->references("id")->on('Grades')->cascadeOnDelete();
            $table->foreignId("classroom_id")->references("id")->on('Classroms')->cascadeOnDelete();
            $table->foreignId("section_id")->references("id")->on('Sections')->cascadeOnDelete();
            $table->foreignId("teacher_id")->references("id")->on('teachers')->cascadeOnDelete();
            $table->date('attendence_date');
            $table->boolean("attendence_status");
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
        Schema::dropIfExists('attendances');
    }
}
