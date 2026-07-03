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
         Schema::table('pages', function (Blueprint $table) {
            $table->text('content')->nullable();
            $table->text('info_1')->nullable();
            $table->text('info_2')->nullable();
            $table->text('info_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'content',
                'info_1',
                'info_2',
                'info_3',
            ]);
        });
    }


};
