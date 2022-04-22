<?php

namespace Database\Factories;

use App\Models\PublicProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'public_profile_id' => PublicProfile::factory(),
            'image_path' => $this->faker->imageUrl
        ];
    }
}
