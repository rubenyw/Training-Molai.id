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
        Schema::create('mejas', function (Blueprint $table) {
            $table->integerIncrements("meja_id");
            $table->string("meja_name", 250);
            $table->integer("meja_capacity");
            $table->integer("meja_available")->default(1)->comment("1 = true, 0 = false");
            $table->integer("status")->default(1)->comment("1 = active, 0 = false");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mejas');
    }
};
