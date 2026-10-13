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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            // Inmueble cotizado
            $table->string('project', 150);
            $table->string('unit', 100);

            // Datos del cliente
            $table->string('name', 100);
            $table->string('phone', 30);
            $table->string('document_type', 50);
            $table->string('document_number', 30);
            $table->string('email', 150);
            $table->text('message')->nullable();
            $table->boolean('terms_accepted')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
