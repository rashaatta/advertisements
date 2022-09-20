<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\AdvertisementImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'from' => $this->faker->date,
            'to' => $this->faker->date,
            'total' => $this->faker->randomFloat(2, 1, 99999999),
            'daily_budget' => $this->faker->randomFloat(2, 1, 99999999),
        ];
    }
}
