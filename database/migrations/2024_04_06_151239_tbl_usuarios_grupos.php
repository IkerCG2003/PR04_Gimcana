<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_usuarios_grupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_usuario')->references('id')->on('tbl_usuarios');
            $table->foreign('id_grupo')->references('id')->on('tbl_grupos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_usuarios_grupos');
    }
};
