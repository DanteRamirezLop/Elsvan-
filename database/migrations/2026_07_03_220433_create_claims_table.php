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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();

            // Datos del reclamante
            $table->string('name', 255);
            $table->string('address', 255);
            $table->string('mail', 255);
            $table->string('phone', 255);
            $table->string('typedocument', 255);
            $table->string('document', 255);

            // Información del servicio y reclamo
            $table->string('services', 255);
            $table->text('hired');
            $table->string('typeclaim', 255);
            $table->text('description');
            $table->string('isauthorization', 255);

            // Información del padre o apoderado
            $table->string('father_name', 255)->nullable();
            $table->string('father_document', 255)->nullable();
            $table->string('father_mail', 255)->nullable();
            $table->string('father_phone', 255)->nullable();
            $table->string('father_address', 255)->nullable();

            // Número de referencia
            $table->string('reference_number', 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
