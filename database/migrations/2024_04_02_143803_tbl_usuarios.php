<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nom_usuario', 30);
            $table->string('apell_usuario', 60);
            $table->string('email_usuario')->unique();
            $table->string('pwd_usuario',60);
            // 0 ADMIN - 1 USUARIO
            $table->boolean('rol_usuario')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
