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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
           $table->string('current_session');
           $table->string('school_title');
           $table->string('school_name');
           $table->string('end_first_term');
           $table->string('end_second_term');
           $table->integer('phone');
           $table->string('address');
           $table->string('school_email');
           $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
