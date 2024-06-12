<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabla: users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabla: password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabla: sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Tabla: tipo_usuario
        Schema::create('tipo_usuario', function (Blueprint $table) {
            $table->id('ID_tipo_usuario');
            $table->string('Nom_tipo_usuario', 50);
            $table->timestamps();
        });

        // Tabla: proveedores
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('ID_proveedores');
            $table->string('Nom_proveedores', 50);
            $table->string('RUC_proveedores', 50);
            $table->string('Telefono_proveedores', 50);
            $table->string('Email_proveedores', 50);
            $table->string('Direccion_proveedores', 50);
            $table->timestamps();
        });

        // Tabla: categorias
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('ID_categorias');
            $table->string('Nom_categorias', 50);
            $table->string('Descr_categorias', 50)->nullable();
            $table->timestamps();
        });

        // Tabla: usuarios
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

        // Tabla: productos
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

        // Tabla: ingresos
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

        // Tabla: detalle_ingreso
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id('ID_det_ingreso');
            $table->foreignId('ID_ingresos')->constrained('ingresos', 'ID_ingresos');
            $table->foreignId('ID_productos')->constrained('productos', 'ID_productos');
            $table->integer('Cantidad');
            $table->double('precio_det_ingreso');
            $table->timestamps();
        });

        // Tabla: clientes
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ID_clientes');
            $table->string('Nom_clientes', 50);
            $table->string('Telefono_clientes', 50);
            $table->string('Email_clientes', 50);
            $table->string('Direccion_clientes', 50);
            $table->timestamps();
        });

        // Tabla: ventas
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

        // Tabla: detalle_ventas
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
        Schema::dropIfExists('ventas');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('detalle_ingreso');
        Schema::dropIfExists('ingresos');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('tipo_usuario');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
