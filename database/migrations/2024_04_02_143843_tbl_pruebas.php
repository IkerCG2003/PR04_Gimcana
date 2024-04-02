<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_pruebas', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prueba', 30);
            $table->string('pista_prueba', 400);
            // 0 DESACTIVADA - 1 ACTIVADA
            $table->boolean('estado_prueba')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_pruebas');
    }
};
