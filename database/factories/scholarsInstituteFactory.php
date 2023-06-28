<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\scholars;
use App\Models\institution;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\scholarsInstitute>
 */
class scholarsInstituteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scholarsId=scholars::pluck('id');
        $institutionId=institution::pluck('id');
        return [
            //
            'scholars_id'=>$this->faker->randomElement($scholarsId),
            'institutions_id'=>$this->faker->randomElement($institutionId),
            'relation_title'=>$this->faker->randomElement(['student','lecture','other']),
            'description'=>$this->faker->sentence(),
        ];
    }
}
