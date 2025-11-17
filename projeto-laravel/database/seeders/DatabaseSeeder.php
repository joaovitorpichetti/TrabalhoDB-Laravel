<?php

namespace Database\Seeders;

// Importe os Models no topo!
use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Criar a primeira editora
        $editora1 = Editora::create([
            'nome' => 'Editora Fantástica',
            'cnpj' => '11.222.333/0001-44'
        ]);

        // 2. Criar a segunda editora
        $editora2 = Editora::create([
            'nome' => 'Editora Saber',
            'cnpj' => '55.666.777/0001-88'
        ]);

        // 3. Criar os livros, associando às editoras
        Livro::create([
            'titulo' => 'A Lenda do Dragão',
            'ano' => 2021,
            'autor_texto' => 'João Silva',
            'editora_id' => $editora1->id // Usa o ID da editora 1
        ]);

        Livro::create([
            'titulo' => 'A História do Mundo',
            'ano' => 2022,
            'autor_texto' => 'Maria Souza',
            'editora_id' => $editora2->id // Usa o ID da editora 2
        ]);

        Livro::create([
            'titulo' => 'Planetas Distantes',
            'ano' => 2023,
            'autor_texto' => 'Carlos Pera, João Silva',
            'editora_id' => $editora1->id // Usa o ID da editora 1
        ]);
    }
}
