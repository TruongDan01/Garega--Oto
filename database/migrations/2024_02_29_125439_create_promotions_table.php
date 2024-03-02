<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');
            $table->string('name');
            $table->string('description');
            $table->tinyInteger('status');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->integer('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
