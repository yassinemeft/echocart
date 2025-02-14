<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('asin');
        $table->string('title');
        $table->string('image_url')->nullable();
        $table->string('productURL')->nullable();  
        $table->decimal('stars', 8, 2);
        $table->decimal('price', 8, 2);
        $table->integer('category_id');
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
