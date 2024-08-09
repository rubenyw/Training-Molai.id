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
        Schema::create('dtrans', function (Blueprint $table) {
            $table->integerIncrements("dtrans_id");
            $table->integer("htrans_id")->unsigned();
            $table->integer("barang_id");
            $table->integer("barang_name", 250);
            $table->integer("barang_price");
            $table->integer("barang_count");
            $table->integer("subtotal");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtrans');
    }
};
