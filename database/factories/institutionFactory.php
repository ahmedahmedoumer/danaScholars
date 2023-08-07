<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\institution>
 */
class institutionFactory extends Factory
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
            'name'=>$this->faker->name(10),
            'location'=>$this->faker->address(),
            'founded_on'=>now(),
            'type_of_institution'=>$this->faker->randomElement(['institution type 1','institution type 2','institution type 3','institution type 4']),
            'description'=>$this->faker->sentence(),
            'photo'=>'/storage/images/images.jpg',
            'status'=>$this->faker->randomElement(['active','not active'])
        ];
    }
}
