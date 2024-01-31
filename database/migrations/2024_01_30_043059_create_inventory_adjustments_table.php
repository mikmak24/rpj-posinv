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
        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->enum('adjustment_type', ['in', 'out', '--']);
            $table->integer('quantity');
            $table->text('reason')->nullable();
            $table->string('adjusted_by')->nullable();
            $table->timestamp('adjustment_date')->default(now());
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_adjustments');
    }
};
