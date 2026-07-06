<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // USER (SAFE)
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // TOTAL PRICE
            $table->decimal('total_price', 10, 2)->default(0);

            // PAYMENT METHOD
            $table->string('payment_method')->nullable();

            // SHIPPING (FIXED - NO FK ERROR)
            $table->unsignedBigInteger('shipping_id')->nullable();

            // STATUS
            $table->enum('status', [
                'pending',
                'processing',
                'shipped',
                'delivered',
                'cancelled'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};