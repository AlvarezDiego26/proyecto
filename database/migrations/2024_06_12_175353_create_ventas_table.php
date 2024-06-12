<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('ID_ventas');
            $table->foreignId('ID_clientes')->constrained('clientes', 'ID_clientes');
            $table->foreignId('ID_usuarios')->constrained('usuarios', 'ID_usuarios');
            $table->string('Tipo_comprobante', 50);
            $table->string('Serie_comprobante', 50);
            $table->string('Num_comprobante', 50);
            $table->date('Fecha');
            $table->double('Impuesto');
            $table->double('total');
            $table->string('Estado', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
