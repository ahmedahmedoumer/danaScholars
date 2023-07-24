<?php

namespace Database\Factories;
use App\models\scholars;
use App\models\institution;
use App\models\educationCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class educationDetailsFactory extends Factory
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
        $educationCategoryId=educationCategories::pluck('id');
        return [
            //
            'scholars_id'=>$this->faker->randomElement($scholarsId),
            'institutions_id'=>$this->faker->randomElement($institutionId),
            'education_categories_id'=>$this->faker->randomElement($educationCategoryId),
            'course_studied'=>$this->faker->title(),
            'detail_description'=>$this->faker->sentence(),
            'years_start'=>now(),
            'years_end'=>now()
        ];
    }
}
