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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Para armazenar o documento (ou usar path)
            $table->string('document');
            // Relacionado à pasta
            $table->foreignId('folder_id')->constrained('name_folders');
            // Chave estrangeira para o usuário que criou o documento
            $table->foreignId('user_create_id')->constrained('users')->default(1);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
