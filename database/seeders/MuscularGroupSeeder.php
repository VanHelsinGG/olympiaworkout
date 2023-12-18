<?php

namespace Database\Seeders;

use App\Models\MuscularGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MuscularGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MuscularGroup::create([
            'group' => 'Peitoral',
        ]);

        MuscularGroup::create([
            'group' => 'Costas',
        ]);

        MuscularGroup::create([
            'group' => 'Ombros',
        ]);

        MuscularGroup::create([
            'group' => 'Biceps',
        ]);

        MuscularGroup::create([
            'group' => 'Triceps',
        ]);

        MuscularGroup::create([
            'group' => 'Antebraço',
        ]);

        MuscularGroup::create([
            'group' => 'Panturrilhas',
        ]);

        MuscularGroup::create([
            'group' => 'Pernas',
        ]);

        MuscularGroup::create([
            'group' => 'Glúteos',
        ]);

        MuscularGroup::create([
            'group' => 'Trapézio',
        ]);

        MuscularGroup::create([
            'group' => 'Abdomem',
        ]);
    }
}
