<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('blog_category_id')->constrained('blog_categories');
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('is_new')->default(true);
            $table->boolean('is_ai')->default(false);
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
