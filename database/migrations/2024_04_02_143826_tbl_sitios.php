<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_sitios', function (Blueprint $table) {
            $table->id();
            $table->string('nom_sitio', 100);
            $table->string('latitud'); 
            $table->string('longitud'); 
            $table->string('ico_sitio', 60);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_sitios');
    }
};
