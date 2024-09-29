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
        Schema::table('stores', function (Blueprint $table) {
            $table->decimal('commission_rate', 5, 2)->nullable();
            $table->json('delivery_methods');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn([
                'commission_rate',
                'delivery_methods',
                'contact_email',
                'contact_phone',
            ]);
        });
    }
};
