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
        Schema::table('real_estate_projects', function (Blueprint $table) {
            $table->string('rooms_from')->nullable();
            $table->string('bathrooms_from')->nullable();
            $table->string('delivery_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('real_estate_projects', function (Blueprint $table) {
            $table->dropColumn('rooms_from');
            $table->dropColumn('rooms_from');
            $table->dropColumn('rooms_from');
        });
    }
};
