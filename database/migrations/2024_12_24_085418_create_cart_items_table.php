<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('product_qty')->default(1);
            $table->bigInteger('total')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
