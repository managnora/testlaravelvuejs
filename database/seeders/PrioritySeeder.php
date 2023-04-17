<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorityLow = new Priority();
        $priorityLow->name = 'Basse priorité';
        $priorityLow->save();

        $priorityMedium = new Priority();
        $priorityMedium->name = 'Moyenne priorité';
        $priorityMedium->save();

        $priorityMajor = new Priority();
        $priorityMajor->name = 'Haute priorité';
        $priorityMajor->save();
    }
}
