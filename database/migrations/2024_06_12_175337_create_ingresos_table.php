<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id('ID_ingresos');
            $table->foreignId('ID_proveedores')->constrained('proveedores', 'ID_proveedores');
            $table->foreignId('ID_usuarios')->constrained('usuarios', 'ID_usuarios');
            $table->string('Tipo_comprobante', 50);
            $table->string('Serie_comprobante', 50);
            $table->string('Num_comprobante', 50);
            $table->date('Fecha');
            $table->double('Impuesto');
            $table->double('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};

