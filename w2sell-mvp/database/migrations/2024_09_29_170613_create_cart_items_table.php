<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id');
            $table->foreignId('store_id');
            $table->foreignId('product_id');
            $table->integer('quantity')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('tax_percent')->nullable();
            $table->decimal('price_incl_tax')->nullable();
            $table->decimal('discount_amount')->nullable();
            $table->string('coupon_code');
            $table->string('product_options');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
