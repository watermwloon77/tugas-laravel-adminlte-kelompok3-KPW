<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peran', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->foreignId('film_id')->constrained('film')->onDelete('cascade');
            $table->foreignId('cast_id')->constrained('cast')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peran');
    }
};