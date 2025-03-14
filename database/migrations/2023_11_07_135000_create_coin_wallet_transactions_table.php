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
        Schema::create('coin_wallet_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->integer('responsible_id');
            $table->string('responsible_type');
            $table->decimal('opening_balance', 30, 18);
            $table->decimal('closing_balance', 30, 18);
            $table->decimal('amount', 30, 18);
            $table->decimal('euro_amount', 30, 18);
            $table->decimal('service_charge', 30, 18);
            $table->decimal('total', 30, 18);
            $table->tinyInteger('type')->comment('1: Credit, 2: Debit')->index();
            $table->longText('comment')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
            $table->index(['responsible_id', 'responsible_type'], 'responsible_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_wallet_transactions');
    }
};
