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
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->foreignId('user')->constrained('users')->primary(); // Utilizando a coluna 'user' como chave primária e estrangeira
            $table->timestamps();
            $table->char('general_group');
            $table->string('specific_permissions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
