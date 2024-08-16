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
        Schema::create('tables', function (Blueprint $table) {
            $table->integerIncrements("table_id");
            $table->string("table_name", 250);
            $table->integer("table_capacity");
            $table->integer("table_available")->default(1)->comment("1 = true, 0 = false");
            $table->integer("status")->default(1)->comment("1 = active, 0 = false");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
