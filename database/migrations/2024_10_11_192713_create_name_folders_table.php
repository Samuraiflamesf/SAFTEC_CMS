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
        Schema::create('name_folders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Chave estrangeira para o usuário que criou a pasta
            $table->foreignId('user_create_id')->constrained('users')->default(1);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('name_folders');
    }
};