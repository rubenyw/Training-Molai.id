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
        Schema::create('htrans', function (Blueprint $table) {
            $table->integerIncrements("htrans_id");
            $table->string("htrans_code", 250);
            $table->dateTime("htrans_date");
            $table->integer("htrans_customer")->unsigned();
            $table->integer("htrans_total")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('htrans');
    }
};
