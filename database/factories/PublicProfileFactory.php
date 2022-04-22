<?php

namespace Database\Factories;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublicProfile>
 */
class PublicProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'gender_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 30),
            'location' => $this->faker->randomElement(['Latvia', 'Lithuania', 'Estonia']),
            'description' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeThisYear
        ];
    }
}
