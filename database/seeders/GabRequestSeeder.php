<?php

namespace Database\Seeders;

use App\Models\GabRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GabRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GabRequest::factory()->count(5)->create();
    }
}
