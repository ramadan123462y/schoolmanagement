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
        Schema::create('onlineclasses', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->foreignId('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
            $table->foreignId('grade_id')->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->dateTime('start_at');
            $table->integer('duration');
            $table->string('password');
            $table->text('start_url');
            $table->text('join_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onlineclasses');
    }
};
