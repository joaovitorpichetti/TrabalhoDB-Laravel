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
        // 'Schema::create' é o "CREATE TABLE..." do Laravel
        Schema::create('editoras', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' auto-increment
            $table->string('nome');
            $table->string('cnpj')->unique(); // 'unique()' garante que não haverá CNPJs duplicados

            // O Laravel por padrão cria as colunas 'created_at' e 'updated_at'.
            // Vamos deixá-las, pois é o "jeito Laravel".
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editoras');
    }
};
