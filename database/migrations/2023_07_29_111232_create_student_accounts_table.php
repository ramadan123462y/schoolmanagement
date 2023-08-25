<?php

use App\Models\Student;
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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('feesInvoice_id')->nullable()->references('id')->on('fees_invoices')->cascadeOnDelete();
            $table->foreignId('receipt_id')->nullable()->references('id')->on('receipt_students')->cascadeOnDelete();
            $table->foreignId('process_fee_id')->nullable()->references('id')->on('process_fees')->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->references('id')->on('payment_students')->cascadeOnDelete();
            $table->decimal('Debit', 8, 2)->nullable();
            $table->decimal('credit', 8, 2)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_accounts');
    }
};
