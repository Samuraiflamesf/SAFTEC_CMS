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
        Schema::create('ouvidorias', function (Blueprint $table) {
            $table->id();
            $table->string('protocolo');
            $table->string('demandante');
            $table->string('setor');
            $table->string('unidade');
            $table->json('medicamento')->default('N/A')->change();
            $table->string('resp_aquisicao');
            $table->string('resp_resposta');
            $table->json('file_espelho')->nullable();
            $table->json('file_documents')->nullable();
            $table->string('obs');
            $table->string('date_dispensacao')->nullable();
            $table->string('date_resposta');
            $table->foreignId('user_create_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null')
                ->default(1);
            $table->string('author_id');
            $table->foreignId('user_create_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null')
                ->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ouvidorias');
    }
};
