<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecoponto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'ponto_referencia',
        'descricao_local',
        'residuos_aceitos',
    ];

    /**
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'residuos_aceitos' => 'array',
        ];
    }
}