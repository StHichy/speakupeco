<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDenunciaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
            'ponto_referencia' => [
                'required', 
                'string', 
                'in:predio_a,predio_b,predio_c,predio_d,predio_e,predio_f,predio_h,predio_i,predio_l,quadra,lago,cantina,estacionamento,portaria'
            ],
            'detalhes_localizacao' => ['nullable', 'string', 'max:1000'],
            'criticidade' => ['required', 'string', 'in:baixa,media,alta'],
        ];
    }
}