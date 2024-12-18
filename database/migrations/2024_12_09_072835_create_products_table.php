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
            // fk
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories');

            $table->foreignId('category_id')->constrained();

            $table->string('name');
            $table->text('description');
            $table->bigInteger('price');
            $table->string('image')->nullable();
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
