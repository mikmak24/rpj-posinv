<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('order_no');
            $table->text('order_discount')->nullable();
            $table->date('order_date');
            $table->double('order_total', 8, 2)->nullable();
            $table->text('payment_method')->nullable();
            $table->double('payment_amount', 8, 2)->nullable();
            $table->double('payment_change', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
