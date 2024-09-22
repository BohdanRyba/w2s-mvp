<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('attribute_set_id')->nullable()->constrained()->nullOnDelete();
            $table->string('sku')->unique();
            $table->foreignId('tax_class_id')->nullable()->constrained()->onDelete('set null');
            $table->string('url_key')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_downloadable')->default(false);
            $table->string('downloadable_link')->nullable();
            $table->json('gift_options')->nullable();
            $table->boolean('is_configurable')->default(false);
            $table->foreignId('parent_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->string('dropshipper_link')->nullable();
            $table->string('wholeseller_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign([
                'parent_id',
                'tax_class_id',
                'attribute_set_id',
            ]);
            $table->dropColumn([
                'attribute_set_id',
                'sku',
                'name',
                'description',
                'price',
                'tax_class_id',
                'url_key',
                'meta_title',
                'meta_keywords',
                'meta_description',
                'is_downloadable',
                'downloadable_link',
                'gift_options',
                'is_configurable',
                'parent_id',
                'dropshipper_link',
                'wholeseller_link',
            ]);
        });
    }
};
