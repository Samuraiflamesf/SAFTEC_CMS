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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            // Chave estrangeira para o usuário que criou o telefone
            $table->foreignId('user_create_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null')
                ->default(1);
            $table->string('user_name'); // Armazena o nome do usuário
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
