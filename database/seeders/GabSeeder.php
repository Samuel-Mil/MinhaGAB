<?php

namespace Database\Seeders;

use App\Models\Gab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gab::factory()
        ->count(50)
        ->create();
    }
}
