<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HomeSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'top_title' => Str::limit(fake()->name(), 15),
            'title' => Str::limit(fake()->name(), 15),
            'sub_title' => Str::limit(fake()->name(), 15),
            'offer' => fake()->paragraph(),
            'link' => 'http://127.0.0.1:8000/shop',
            'image' => 'default.png',
            // file:///C:/xampp/htdocs/laravel_online_shop/public/assets/imgs/slider/slider-1.png
            'category_text' => 'Shop Now',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
