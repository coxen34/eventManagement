<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class eventFactory extends Factory
{
    // El nombre del modelo correspondiente a la factoría
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'event_date' => $this->faker->date,
            'start_time' => $this->faker->time,
            // 'end_time' => $this->faker->time,
            'street' => $this->faker->streetAddress,
            'zipcode' => $this->faker->postcode,
            'locality' => $this->faker->city,
            'country' => $this->faker->country,
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Art and Culture', 'Sports', 'Concerts', 'Gastronomy', 'Beauty-Fashion', 'Health-Wellness', 'Family-Friendly']),
            'price' => $this->faker->randomFloat(2, 1, 999.99),
            'max_capacity' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
