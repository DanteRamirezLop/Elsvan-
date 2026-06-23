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
        Schema::create('project_blueprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('real_estate_project_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('number_departments')->nullable();
            $table->decimal('area_from', 8, 2);
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('garden');
            $table->string('balcony');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_blueprints');
    }
};
