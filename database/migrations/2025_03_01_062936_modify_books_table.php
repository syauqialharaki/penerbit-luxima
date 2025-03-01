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
        Schema::table('books', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->string('author')->nullable()->change();
            $table->string('publisher')->nullable()->change();
            $table->integer('isbn')->nullable()->change();
            $table->integer('year')->nullable()->change();
            $table->integer('stock')->nullable()->change();
            $table->integer('price')->nullable()->change();
            $table->string('image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->text('description')->change();
            $table->string('author')->change();
            $table->string('publisher')->change();
            $table->integer('isbn')->change();
            $table->integer('year')->change();
            $table->integer('stock')->change();
            $table->integer('price')->change();
            $table->string('image')->change();
        });
    }
};
