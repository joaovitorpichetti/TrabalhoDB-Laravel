<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;

    /**
     * PONTO DE "MÁGICA" 1: Desativar Timestamps
     * O Laravel espera colunas 'created_at' e 'updated_at'.
     * Como nossa tabela não as tem, desativamos.
     */
    public $timestamps = false;

    /**
     * PONTO DE "MÁGICA" 2: Mass Assignment
     * Dizemos ao Laravel quais colunas são seguras
     * para preenchimento em massa (ex: Editora::create([...])).
     */
    protected $fillable = ['nome', 'cnpj'];

    /**
     * PONTO DE "MÁGICA" 3: Relações
     * Definimos a relação 1:N com Livros.
     * O SQL (JOIN) "desaparece".
     */
    public function livros()
    {
        // "Uma Editora TEM MUITOS Livros"
        return $this->hasMany(Livro::class);
    }
}
