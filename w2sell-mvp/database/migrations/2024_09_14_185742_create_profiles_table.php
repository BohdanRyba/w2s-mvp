<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('image');
            $table->string('bg_image');
            $table->string('country');
            $table->string('language');
            $table->string('contact');
            $table->string('messanger');
            $table->string('email');

            $table->string('state');
            $table->string('zip');
            $table->string('timezone');
            $table->string('currency');
            $table->string('address');
            $table->string('address1');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
