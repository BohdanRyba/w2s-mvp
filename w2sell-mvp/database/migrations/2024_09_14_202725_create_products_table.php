<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('store_id');
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->integer('stock_treshhold');
            $table->string('image');
            $table->string('images')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->integer('size_unit_type')->nullable();
            $table->integer('weight_unit_type')->nullable();
            $table->json('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
