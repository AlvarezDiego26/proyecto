<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('ID_proveedores');
            $table->string('Nom_proveedores', 50);
            $table->string('RUC_proveedores', 50);
            $table->string('Telefono_proveedores', 50);
            $table->string('Email_proveedores', 50);
            $table->string('Direccion_proveedores', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
