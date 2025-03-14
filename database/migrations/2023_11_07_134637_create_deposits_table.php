<?php

use App\Models\Deposit;
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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained();
            $table->unsignedBigInteger('ico_detail_id')->nullable();
            $table->bigInteger('order_no')->unique();
            $table->string('pg_id')->nullable();
            $table->integer('pg_type')->nullable()->comment('1: Mollie, 2: Stripe');
            $table->decimal('coin_price', 30, 18);
            $table->decimal('euro_amount', 30, 18);
            $table->decimal('amount', 30, 18);
            $table->integer('status')
                ->comment('1: Pending, 2: Completed, 3: Failed, 4: Cancelled')
                ->default(Deposit::STATUS_PENDING)
                ->index();
            $table->timestamps();

            $table->unique(['pg_id', 'pg_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
