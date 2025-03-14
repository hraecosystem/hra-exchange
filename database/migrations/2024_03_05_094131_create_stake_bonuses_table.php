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
        Schema::create('stake_bonuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stake_id')->constrained();
            $table->decimal('percentage', 30, 18);
            $table->decimal('coin_price', 30, 18);
            $table->decimal('euro_amount', 30, 18);
            $table->decimal('amount', 30, 18);
            $table->decimal('initial_amount', 30, 18);
            $table->decimal('initial_euro_amount', 30, 18);
            $table->longText('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stack_bonuses');
    }
};
