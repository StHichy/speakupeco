<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model

{
    use HasFactory;

    protected $fillable = [
        'ponto_referencia',
        'detalhes_localizacao',
        'foto_path',
        'criticidade',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}