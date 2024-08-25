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
            $table->integerIncrements("order_id");
            $table->string("order_code", 100);
            $table->dateTime("order_date");
            $table->string("order_cashier", 250);
            $table->string("order_customer", 250);
            $table->integer("meja_id");
            $table->integer("order_total");
            $table->integer("order_status")->default(1)->comment("0 = deleted");
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
