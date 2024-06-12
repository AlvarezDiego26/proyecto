<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('ID_productos');
            $table->foreignId('ID_categorias')->constrained('categorias', 'ID_categorias');
            $table->string('Cod_Barra_productos', 50);
            $table->string('Nom_productos', 50);
            $table->integer('Stock_productos');
            $table->double('Precio_productos');
            $table->string('Estado_productos', 50);
            $table->date('Fecha_produccion')->nullable();
            $table->date('Fecha_vencimiento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
