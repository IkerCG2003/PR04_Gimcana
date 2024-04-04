<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_grupos_gimcanas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_gimcana');
            $table->foreign('id_grupo')->references('id')->on('tbl_grupos');
            $table->foreign('id_gimcana')->references('id')->on('tbl_gimcanas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_grupos_gimcanas');
    }
};
