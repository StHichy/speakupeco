<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ecopontos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('ponto_referencia')->comment('Chave padronizada do local no mapa da Facens');
            $table->string('descricao_local')->nullable()->comment('Detalhes de posicionamento fino');
            $table->json('residuos_aceitos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ecopontos');
    }
};