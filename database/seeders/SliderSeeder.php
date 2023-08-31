<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeSlider::factory()
            ->count(10)
            ->create();
    }
}
