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
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->integerIncrements("detail_id");
            $table->integer("order_id");
            $table->integer("menu_id");
            $table->string("detail_name", 250);
            $table->integer("detail_price");
            $table->integer("detail_qty");
            $table->integer("detail_subtotal");
            $table->string("detail_notes", 250);
            $table->integer("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
