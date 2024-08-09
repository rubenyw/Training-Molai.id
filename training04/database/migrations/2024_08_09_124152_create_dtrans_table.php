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
            $table->increments("dtrans_id");
            $table->unsignedInteger("htrans_id");
            $table->foreign("htrans_id")->references("htrans_id")->on("htrans");
            $table->unsignedInteger("barang_id");
            $table->foreign("barang_id")->references("barang_id")->on("barangs");
            $table->string("barang_name", 250);
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
