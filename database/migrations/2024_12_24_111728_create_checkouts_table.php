<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 50);
            $table->string('email', 30);
            $table->string('shipping_address');
            $table->string('city', 30);
            $table->string('state', 30);
            $table->bigInteger('zipcode');
            $table->string('country', 30);
            $table->unsignedBigInteger('cart_item_id');
            $table->foreign('cart_item_id')->references('id')->on('cart_item');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
