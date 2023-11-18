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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->unsignedBigInteger('payer');
            $table->foreign('payer')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('due_on');
            $table->float('vat');
            $table->enum('is_vat_inclusive', ['yes', 'no'])->default('yes');
            $table->enum('status', ['paid', 'Outstanding', 'Overdue'])->default('Outstanding');
            $table->float('amount_after_payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
