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
        Schema::create('order_product_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('order_product_id');
            $table->unsignedBigInteger('ingredient_id');

            // $table->foreign('order_product_id')
            // ->references('id')
            // ->on('order_products')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product_ingredient');
    }
};
