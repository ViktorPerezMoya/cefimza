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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('puesto',50);
            $table->string('imagen');
            $table->timestamps();
        });

        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->id();
            $table->string('icono',50);
            $table->string('link',50);
            $table->unsignedBigInteger('integrante_id');
            $table->foreign('integrante_id')->references('id')->on('integrantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrantes');
        Schema::dropIfExists('redes_sociales');
    }
};
