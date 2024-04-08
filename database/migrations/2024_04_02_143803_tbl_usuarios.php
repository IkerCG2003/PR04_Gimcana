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
            // 1 USUARIO - 2 ADMIN
            $table->boolean('rol_usuario')->default(1);
            $table->timestamps();   
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
