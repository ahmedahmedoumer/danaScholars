<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\awards>
 */
class awardsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name_of_awards'=>$this->faker->name(),
            'award_date'=>now(),
            'award_description'=>$this->faker->sentence()
        ];
    }
}
