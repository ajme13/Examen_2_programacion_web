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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('identidad',13)->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->string('cargo');
            $table->decimal('salario', 10, 2);
            $table->boolean('activo')->default(true); //el estado por defecto esta en activo(inactivo false)
            $table->date('ingreso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
