<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ecoponto;
use App\Http\Requests\EcopontoRequest;
use Illuminate\Http\JsonResponse;

class EcopontoController extends Controller
{
    public function index(): JsonResponse
    {
        $ecopontos = Ecoponto::all();
        return response()->json($ecopontos);
    }

    public function store(EcopontoRequest $request): JsonResponse
    {
        $ecoponto = Ecoponto::create($request->validated());
        return response()->json($ecoponto, 201);
    }

    public function show(Ecoponto $ecoponto): JsonResponse
    {
        return response()->json($ecoponto);
    }

    public function update(EcopontoRequest $request, Ecoponto $ecoponto): JsonResponse
    {
        $ecoponto->update($request->validated());
        return response()->json($ecoponto);
    }

    public function destroy(Ecoponto $ecoponto): JsonResponse
    {
        $ecoponto->delete();
        return response()->json(null, 204);
    }
}