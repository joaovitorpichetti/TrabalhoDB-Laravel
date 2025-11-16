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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('ano');
            $table->string('autor_texto')->nullable(); // 'nullable()' permite que este campo fique em branco

            // --- Esta é a CHAVE ESTRANGEIRA ---
            // 1. Cria a coluna 'editora_id'
            $table->foreignId('editora_id')
                // 2. Diz que ela está "presa" (constrained) à tabela 'editoras'
                ->constrained('editoras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};

