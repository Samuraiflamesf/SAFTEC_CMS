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
        Schema::create('feria', function (Blueprint $table) {
            $table->id();
            // Chave estrangeira para o usuário que está de férias
            $table->foreignId('user_id')->constrained('users');
            $table->integer('days_ferias');
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->string('detail')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferias');
    }
};