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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('kode_produk')->unique();
        $table->string('nama_produk');
        
        // Foreign Key ke tabel categories
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        
        $table->bigInteger('harga_beli');
        $table->bigInteger('harga_jual');
        $table->integer('stok');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
