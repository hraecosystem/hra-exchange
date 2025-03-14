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
        Schema::create('ico_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('days');
            $table->decimal('supply', 30, 18);
            $table->decimal('price');
            $table->decimal('min_buy');
            $table->decimal('total_purchase', 30, 18)->default(0);
            $table->tinyInteger('status')->default(\App\Models\IcoDetail::STATUS_PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ico_details');
    }
};
