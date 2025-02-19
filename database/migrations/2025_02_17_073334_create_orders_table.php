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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->float('subtotal', 8, 2);
            $table->float('amount', 8, 2);
            $table->float('discount', 8, 2);
            $table->enum('payment_mode',['cod','online']);
            $table->enum('status', ['pending','processed', 'shipped', 'delivered', 'cancelled','returned', 'refunded'])->default('pending');
            $table->string('shipping_name');
            $table->string('shipping_contact');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_pin');
            $table->string('billing_name');
            $table->string('billing_contact');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_pin');
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->float('selling_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
