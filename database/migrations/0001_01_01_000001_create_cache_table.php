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
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 191)->primary(); // Ajustando o tamanho do key
            $table->mediumText('value'); // O mediumText não precisa de tamanho especificado
            $table->integer('expiration'); // O tamanho padrão é suficiente
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 191)->primary(); // Ajustando o tamanho do key
            $table->string('owner', 191); // Ajustando o tamanho do owner
            $table->integer('expiration'); // O tamanho padrão é suficiente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
