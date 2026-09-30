<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EcopontoRequest extends FormRequest
{
    public function authorize(): bool
    {
        // A autorização de rotas protegidas já ocorre no middleware auth:sanctum
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'ponto_referencia' => [
                'required', 
                'string', 
                'in:predio_a,predio_b,predio_c,predio_d,predio_e,predio_f,predio_h,predio_i,predio_l,quadra,lago,cantina,estacionamento,portaria'
            ],
            'descricao_local' => ['nullable', 'string', 'max:500'],
            'residuos_aceitos' => ['required', 'array'],
            'residuos_aceitos.*' => ['string', 'max:100'],
        ];
    }
}