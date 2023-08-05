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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('site_name')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('favicon_image')->nullable();;
            $table->string('address')->nullable();;
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            // $table->string('twitter')->nullable();
            // $table->string('facebook')->nullable();
            // $table->string('instagram')->nullable();
            // $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_infos');
    }
};
