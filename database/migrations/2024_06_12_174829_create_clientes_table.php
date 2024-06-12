<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ID_clientes');
            $table->string('Nom_clientes', 50);
            $table->string('Telefono_clientes', 50);
            $table->string('Email_clientes', 50);
            $table->string('Direccion_clientes', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
