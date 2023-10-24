<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\organization>
 */
class organizationFactory extends Factory
{
    protected $model = Organization::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'street' => $this->faker->streetAddress,
            'zipcode' => $this->faker->postcode,
            'locality' => $this->faker->city,
            'province' => $this->faker->state,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,


        ];
    }
}
