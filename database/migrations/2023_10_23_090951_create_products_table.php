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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->unsignedInteger('price');
            $table->unsignedFloat('rating')->nullable();
            $table->unsignedInteger('times_purchased')->nullable();
            $table->string('brand');
            $table->string('view');
            $table->string('type');
            $table->string('design_and_construction')->nullable();
            $table->string('size');
            $table->string('category')->nullable();
            $table->string('img_uri')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
