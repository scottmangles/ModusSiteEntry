<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $siteManagers = User::select()->where('role', 'site_manager')->get();

        return [
            'name' => $this->faker->city(),
            'site_manager' => $siteManagers->random()->id,
            'open_at' => $this->faker->time(),
            'closed_at' => $this->faker->time(),
            'qr_src' => 'userfind/site/1',
            'status' => $this->faker->randomElement(['active', 'completed']),
        ];
    }
}
