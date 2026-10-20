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
        Schema::table('sperant_settings', function (Blueprint $table) {
            $table->unsignedInteger('facebook_ads_source_id')->nullable();
            $table->unsignedInteger('instagram_ads_source_id')->nullable();
            $table->unsignedInteger('meta_ads_input_channel_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sperant_settings', function (Blueprint $table) {
            $table->dropColumn(['facebook_ads_source_id', 'instagram_ads_source_id', 'meta_ads_input_channel_id']);
        });
    }
};
