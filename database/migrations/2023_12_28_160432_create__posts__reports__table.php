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
        Schema::create('post_reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('post')->constrained('posts');
            $table->foreignId('delator')->constrained('users');
            $table->string('general_reason');
            $table->string('specific_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_reports');
    }
};
