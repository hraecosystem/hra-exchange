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
        Schema::create('p_2_p_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_member_id')->constrained('members');
            $table->foreignId('to_member_id')->constrained('members');
            $table->decimal('amount', 30, 18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_2_p_transfers');
    }
};
