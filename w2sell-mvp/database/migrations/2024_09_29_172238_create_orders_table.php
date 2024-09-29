<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('shipping_address_id');
            $table->foreignId('billing_address_id');
            $table->decimal('subtotal')->nullable();
            $table->decimal('tax_amount')->nullable();
            $table->decimal('discount_amount')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->string('status')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('payment_method')->nullable();
            $table->boolean('is_paid');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
