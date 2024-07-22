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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personaId')->constrained('personas');
            $table->foreignId('productoId')->constrained('productos');
            $table->timestamp('Fecha_pedido');
            $table->integer('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    //las tablas al crear las migraciones deben ser plural
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
