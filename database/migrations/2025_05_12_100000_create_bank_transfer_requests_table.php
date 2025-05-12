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
        Schema::create('bank_transfer_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('iban');
            $table->string('swift_code')->nullable(); // SWIFT code is often optional
            $table->decimal('amount_hra', 18, 8); // Amount of HRA Coin requested
            $table->decimal('amount_fiat', 18, 2)->nullable(); // Equivalent fiat amount (can be calculated later)
            $table->string('status')->default('pending'); // e.g., 'pending', 'approved', 'rejected'
            $table->text('admin_notes')->nullable(); // Notes from admin upon rejection/approval
            $table->string('payment_proof')->nullable(); // Path to payment proof file or transaction ID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_transfer_requests');
    }
};
