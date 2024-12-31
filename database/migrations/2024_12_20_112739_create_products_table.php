<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('product_img')->nullable();
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_category');
            $table->string('product_weight');
            $table->string('product_brand');
            $table->string('manufacturing_date');
            $table->string('product_desc');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
