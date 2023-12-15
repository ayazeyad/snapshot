<?php

namespace Database\Seeders;

use App\Models\buy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        buy::factory()->count(5)->create();
    }
}
