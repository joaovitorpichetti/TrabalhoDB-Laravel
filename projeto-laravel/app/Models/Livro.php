<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    // Desativamos os timestamps
    public $timestamps = false;

    // Definimos as colunas "preenchíveis"
    protected $fillable = ['titulo', 'ano', 'autor_texto', 'editora_id'];

    /**
     * PONTO DE "MÁGICA" 4: Relação Inversa
     * Definimos que este Livro PERTENCE A UMA Editora.
     */
    public function editora()
    {
        // "Um Livro PERTENCE A UMA Editora"
        return $this->belongsTo(Editora::class);
    }
}
