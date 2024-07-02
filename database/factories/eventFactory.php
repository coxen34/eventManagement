<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;


class eventFactory extends Factory
{
    
    protected $model = Event::class;
    
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5), 
            'event_date' => $this->faker->dateTimeBetween('2023-01-01', '2030-12-31')->format('Y-m-d'),
            'start_time' => $this->faker->time,
            'street' => $this->faker->streetAddress,
            'zipcode' => $this->faker->postcode,
            'locality' => $this->faker->city,
            'country' => $this->faker->country,
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Art and Culture', 'Sports', 'Concerts', 'Gastronomy', 'Beauty-Fashion', 'Health-Wellness', 'Family-Friendly']),
            'price' => number_format($this->faker->randomFloat(2, 1, 999.99)), 
            'max_capacity' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
