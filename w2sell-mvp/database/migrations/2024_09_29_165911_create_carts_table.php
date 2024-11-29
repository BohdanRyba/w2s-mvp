<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('guest_token')->nullable();
            $table->string('currency_code')->nullable();
            $table->decimal('subtotal')->nullable();
            $table->decimal('tax_amount')->nullable();
            $table->decimal('discount_amount')->nullable();
            $table->decimal('grand_total')->nullable();
            $table->boolean('is_guest')->nullable();
            $table->string('coupon_code');
            $table->foreignId('billing_address_id');
            $table->foreignId('shipping_address_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};