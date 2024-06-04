<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'autor', 'ano_publicacao', 'descricao', 'categoria_id',
    ];

    // Define o relacionamento com o modelo Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
