<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'advertisement_id' => Advertisement::factory(),
            'file_name' => $this->faker->name,
            'mime_type' => $this->faker->fileExtension(),
            'size' => $this->faker->randomFloat(),
        ];
    }

}
