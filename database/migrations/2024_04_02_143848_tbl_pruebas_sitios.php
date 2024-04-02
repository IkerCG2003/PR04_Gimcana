<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_pruebas_sitios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_prueba');
            $table->unsignedBigInteger('id_sitio');
            $table->foreign('id_prueba')->references('id')->on('tbl_pruebas');
            $table->foreign('id_sitio')->references('id')->on('tbl_sitios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_pruebas_sitios');
    }
};
