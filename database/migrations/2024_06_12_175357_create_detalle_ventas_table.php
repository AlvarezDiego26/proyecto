<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('ID_det_ventas');
            $table->foreignId('ID_ventas')->constrained('ventas', 'ID_ventas');
            $table->foreignId('ID_productos')->constrained('productos', 'ID_productos');
            $table->integer('Cantidad');
            $table->double('precio');
            $table->double('descuento');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};

