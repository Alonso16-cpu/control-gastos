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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto', 10, 2);
            $table->string('descripcion');
            $table->date('fecha');
            $table->foreignId('categoria_id')->constrained('categorias')->cascadeOnDelete();
            $table->string('analisis-sentimiento');
            $table->string('prediccion_ia')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
