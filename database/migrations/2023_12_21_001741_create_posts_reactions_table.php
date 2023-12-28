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
        Schema::create('posts_reactions', function (Blueprint $table) {
            $table->foreignId('post')->constrained('posts')->primary();
            $table->foreignId('user')->constrained('users');
            $table->char('reaction_type',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_reactions');
    }
};
