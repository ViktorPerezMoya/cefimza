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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->text('contenido')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('in_menu')->nullable()->default(false);
            $table->boolean('in_home')->nullable()->default(false);
            $table->boolean('visible')->nullable()->default(false);
            $table->string('link')->nullable();
            $table->string('tipo');
            $table->integer('orden_home')->defaul(0);
            $table->integer('orden_menu')->defaul(0);
            $table->timestamps();
        });

        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('titulo',50);
            $table->string('detalle', 100)->nullable();
            $table->string('label_link', 20)->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('seccion_id');
            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            $table->string('icono',20);
            $table->string('detalle',50);
            $table->string('valor',50);
            $table->string('link')->nullable();
            $table->unsignedBigInteger('seccion_id');
            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('titulo',70);
            $table->string('url',70);
            $table->string('autor',50);
            $table->date('fecha');
            $table->string('resumen',255);
            $table->text('contenido');
            $table->boolean('visible')->nullable()->default(false);
            $table->unsignedBigInteger('seccion_id');
            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('adjuntos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('path');
            $table->string('tipo',50);
            $table->unsignedBigInteger('informe_id');
            $table->foreign('informe_id')->references('id')->on('informes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones');
        Schema::dropIfExists('tarjetas');
        Schema::dropIfExists('datos');
        Schema::dropIfExists('informes');
        Schema::dropIfExists('adjuntos');
    }
};
