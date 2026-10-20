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
        Schema::create('sperant_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled')->default(false);
            $table->string('url')->nullable();
            $table->text('token')->nullable();
            $table->string('clients_endpoint')->nullable();
            $table->unsignedInteger('input_channel_id')->nullable();
            $table->unsignedInteger('source_id')->nullable();
            $table->unsignedInteger('interest_type_id')->nullable();
            $table->unsignedInteger('default_project_id')->nullable();
            $table->unsignedInteger('google_ads_source_id')->nullable();
            $table->unsignedInteger('google_ads_input_channel_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sperant_settings');
    }
};
