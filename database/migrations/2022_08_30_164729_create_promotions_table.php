<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('from_facultie_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreignId('from_classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('from_section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('to_facultie_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreignId('to_classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('to_section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->string('academic_year');
            $table->string('academic_year_new');
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
        Schema::dropIfExists('promotions');
    }
};
