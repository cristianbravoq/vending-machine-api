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
        Schema::create('log_coins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_id');
            $table->decimal('value', 4, 2);
            $table->timestamps();

            // Clave foránea para relacionar con la tabla de logs
            $table->foreign('log_id')->references('id')->on('logs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_coins');
    }
};
