<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('ID_usuarios');
            $table->foreignId('ID_tipo_usuario')->constrained('tipo_usuario', 'ID_tipo_usuario');
            $table->string('Nom_usuarios', 50);
            $table->string('Telefono_usuarios', 50);
            $table->string('Email_usuarios', 50);
            $table->string('Login_usuarios', 50);
            $table->string('Password_usuarios', 50);
            $table->string('Estado_usuarios', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
