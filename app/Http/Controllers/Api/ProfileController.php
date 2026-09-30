<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();
        $dadosAtualizados = $request->validated();

        if ($request->hasFile('foto_perfil')) {
            // Remove a foto antiga do servidor 
            if ($user->foto_perfil_path && Storage::disk('public')->exists($user->foto_perfil_path)) {
                Storage::disk('public')->delete($user->foto_perfil_path);
            }
            
            // Grava a nova imagem no diretório
            $dadosAtualizados['foto_perfil_path'] = $request->file('foto_perfil')->store('profile_photos', 'public');
        }

        $user->update($dadosAtualizados);

        // Gera a URL absoluta da imagem 
        $user->foto_perfil_url = $user->foto_perfil_path ? asset('storage/' . $user->foto_perfil_path) : null;

        return response()->json([
            'message' => 'Perfil atualizado com sucesso.',
            'user' => $user
        ]);
    }
    public function destroy(Request $request): JsonResponse
    {
        $user = $request->user();

        // Remove a foto de perfil do servidor 
        if ($user->foto_perfil_path && Storage::disk('public')->exists($user->foto_perfil_path)) {
            Storage::disk('public')->delete($user->foto_perfil_path);
        }

        // Apaga o registo do utilizador. 
        // Os tokens do Sanctum e as denúncias associadas serão removidos automaticamente em cascata.
        $user->delete();

        return response()->json([
            'message' => 'Conta encerrada e dados apagados com sucesso.'
        ]);
    }
}