<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('from_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreignId('from_Classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('to_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreignId('to_Classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('to_section')->references('id')->on('sections')->onDelete('cascade');
            $table->string('academic_year');
            $table->string('academic_year_new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
