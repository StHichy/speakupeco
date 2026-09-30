<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use App\Http\Requests\StoreDenunciaRequest;
use Illuminate\Http\JsonResponse;

class DenunciaController extends Controller
{
    public function index(): JsonResponse
    {
        // Retorna todas as denúncias com os dados do usuário criador
        $denuncias = Denuncia::with('user:id,name')->get();
        
        // Mapeia os caminhos das imagens para URLs absolutas
        $denuncias->transform(function ($denuncia) {
            $denuncia->foto_url = asset('storage/' . $denuncia->foto_path);
            return $denuncia;
        });

        return response()->json($denuncias);
    }

    public function store(StoreDenunciaRequest $request): JsonResponse
    {
        // 1. Armazena a imagem no diretório storage/app/public/denuncias
        $caminhoArquivo = $request->file('foto')->store('denuncias', 'public');

        // 2. Cria o registro vinculado ao usuário autenticado
        $denuncia = $request->user()->denuncias()->create([
            'ponto_referencia' => $request->ponto_referencia,
            'detalhes_localizacao' => $request->detalhes_localizacao,
            'criticidade' => $request->criticidade,
            'foto_path' => $caminhoArquivo,
        ]);

        $denuncia->foto_url = asset('storage/' . $denuncia->foto_path);

        return response()->json($denuncia, 201);
    }
}