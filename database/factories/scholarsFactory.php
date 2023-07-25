<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\scholars>
 */
class scholarsFactory extends Factory
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
            'fname'=>$this->faker->name(8),
            'lname'=>$this->faker->name(8),
            'mothers_name'=>$this->faker->name(),
            'birth_date'=>now(),
            'death_date'=>now(),
            'photo'=>'images.png',
            'birth_place'=>$this->faker->address(),
            'family'=>$this->faker->name(),
            'knowledge'=>$this->faker->title(),
            'children'=>$this->faker->sentence(),
            'description'=>$this->faker->sentence(),
            'founder'=>$this->faker->randomElement(['company1','company2','company3'])
        ];
    }
}
