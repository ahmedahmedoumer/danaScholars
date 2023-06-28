<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\awards;
use App\Models\institution;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class instituteAwardsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $award_id=awards::pluck('id');
        $institutionId=institution::pluck('id');
        return [
            //
            'awards_id'=>$this->faker->randomElement($award_id),
            'institutions_id'=>$this->faker->randomElement($institutionId),
            'description'=>$this->faker->sentence()
        ];
    }
}
