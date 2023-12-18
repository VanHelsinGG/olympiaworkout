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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('training_name');
            $table->boolean('active');
            $table->integer('duration');
            $table->integer('times_done');
            $table->integer('next_training');
            $table->string('exercises');
            $table->string('series');
            $table->string('muscular_groups');
            $table->string('weights');
            $table->foreignId('user')->constrained('users');
            $table->foreignId('teacher')->constrained('users');
        });

        Schema::create('finished_training_history', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('time_elapsed');
            $table->foreignId('muscular_group')->constrained('muscular_groups');
            $table->foreignId('training')->constrained('trainings');
            $table->foreignId('user')->constrained('users');
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
