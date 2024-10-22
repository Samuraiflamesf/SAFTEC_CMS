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
        Schema::table('ouvidorias', function (Blueprint $table) {
            $table->boolean('dado_sigiloso')->default(false); // Adiciona a coluna 'dado_sigiloso'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ouvidorias', function (Blueprint $table) {
            $table->dropColumn('dado_sigiloso'); // Remove a coluna se a migração for revertida
        });
    }
};
