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
        Schema::create('languageables', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id');
            $table->morphs('languageable');
            $table->string('name');
            $table->longText('description')->nullable();

            $table->index('name');

            // $table->foreign('language_id')
            // ->references('id')
            // ->on('languages')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languageable');
    }
};
