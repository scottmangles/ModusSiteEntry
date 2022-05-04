<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'mobile' => $this->faker->regexify('07[7-9]{1}[0-9]{8}'),
            'sub_contractor' => $this->faker->randomElement(['V & A Electrical', 'Marios', 'Block Bro\'s']),
            'vehicle_make' => $this->faker->randomElement(['Ford', 'Mitsubishi', 'Mercedes']),
            'vehicle_reg' => $this->faker->regexify('[A-Z]{2}[5-7]{2} [0-9]{1}[A-Z]{2}'),
            'cscs_number' => $this->faker->regexify('[1-9]{8}'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
