<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id('ID_det_ingreso');
            $table->foreignId('ID_ingresos')->constrained('ingresos', 'ID_ingresos');
            $table->foreignId('ID_productos')->constrained('productos', 'ID_productos');
            $table->integer('Cantidad');
            $table->double('precio_det_ingreso');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_ingreso');
    }
};
