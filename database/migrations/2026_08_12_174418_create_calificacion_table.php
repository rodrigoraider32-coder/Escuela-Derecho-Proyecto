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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->decimal('calificacion_propuesta', 5, 2)->nullable();
            $table->enum('status', ['aprobado', 'pendiente', 'rechazado'])->default('aprobado');
            $table->string('periodo')->default('2026-1');
            $table->string('exam_tipo')->default('ORD');
            $table->boolean('is_unlocked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
