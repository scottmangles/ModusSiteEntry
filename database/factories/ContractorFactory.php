<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContractorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'contact_person' => $this->faker->name(),
            'phone' => $this->faker->regexify('07[7-9]{1}[0-9]{8}'),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
