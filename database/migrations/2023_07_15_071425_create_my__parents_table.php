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



        Schema::create('my__parents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Fatherinformation
            $table->string('Name_Father');
            $table->string('National_ID_Father');
            $table->string('Passport_ID_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            //relation shipe father-------

            $table->foreignId('Nationality_Father_id')->references('id')->on('nationalities')->cascadeOnDelete();
            $table->foreignId('Blood_Type_Father_id')->references('id')->on('bloods')->cascadeOnDelete();
            $table->foreignId('Religion_Father_id')->references('id')->on('religions')->cascadeOnDelete();


            $table->string('Address_Father');

            //Mother information
            $table->string('Name_Mother');
            $table->string('National_ID_Mother');
            $table->string('Passport_ID_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');


            $table->foreignId('Nationality_Mother_id')->references('id')->on('nationalities')->cascadeOnDelete();
            $table->foreignId('Blood_Type_Mother_id')->references('id')->on('bloods')->cascadeOnDelete();
            $table->foreignId('Religion_Mother_id')->references('id')->on('religions')->cascadeOnDelete();

            //relation shipe mother-------
            $table->string('Address_Mother');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my__parents');
    }
};
