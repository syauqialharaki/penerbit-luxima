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
        Schema::create('purchases', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('book_id');
            $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('marketplaces_id');
            $table->foreign('marketplaces_id')->references('id')->on('marketplaces')->onUpdate('cascade')->onDelete('cascade');

            $table->string('link_url');
            $table->string('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
