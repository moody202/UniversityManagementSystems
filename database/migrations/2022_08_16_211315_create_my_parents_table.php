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
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            // Father inf

            $table->string('name_father');
            $table->string('nat_id_father');
            $table->string('passport_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->foreignId('religion_father_id')->references('id')->on('religions')->onDelete('cascade');
            $table->foreignId('gender_father_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreignId('notionlitie_father_id')->references('id')->on('notionlities')->onDelete('cascade');
            $table->string('addres_father');

            // Mother inf
            $table->string('name_mather');
            $table->string('nat_id_mather');
            $table->string('passport_mather');
            $table->string('phone_mather');
            $table->string('job_mather');
            $table->foreignId('religion_mather_id')->references('id')->on('religions')->onDelete('cascade');
            $table->foreignId('gender_mather_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreignId('notionlitie_mather_id')->references('id')->on('notionlities')->onDelete('cascade');
            $table->string('addres_mather');
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
        Schema::dropIfExists('my_parents');
    }
};
