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
        Schema::create('barangs', function (Blueprint $table) {
            $table->integerIncrements("barang_id");
            $table->integer("category_id")->unsigned();
            $table->foreign("category_id")->references("category_id")->on("categories");
            $table->text("barang_code");
            $table->string("barang_name", 250);
            $table->integer("barang_price");
            $table->integer("barang_stock");
            $table->longText("barang_picture");
            $table->integer("status")->default(1)->comment("1 = active, 0 = dead");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
