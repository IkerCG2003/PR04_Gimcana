<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_grupos', function (Blueprint $table) {
            $table->id();
            $table->decimal('numero_grupo')->nullable();
            $table->string('nombre_grupo', 30);
            $table->decimal('capacidad_grupo')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('tbl_usuarios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_grupos');
    }
};
