<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('ponto_referencia')->comment('Chave vinculada ao mapa estático da Facens');
            $table->text('detalhes_localizacao')->nullable()->comment('Ex: Atrás da arquibancada');
            $table->string('foto_path')->comment('Caminho no storage local');
            $table->enum('status', ['pendente', 'em_analise', 'resolvida'])->default('pendente');
            $table->enum('criticidade', ['baixa', 'media', 'alta']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};