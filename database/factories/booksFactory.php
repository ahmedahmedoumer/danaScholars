<?php

namespace Database\Factories;
use App\models\bookCategory;
use App\models\scholars;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\books>
 */
class booksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bookCategoryId=bookCategory::pluck('id');
        $scholarsId=scholars::pluck('id');

        return [
            //
            'book_name'=>$this->faker->name(),
            'author'=>$this->faker->randomElement($scholarsId),
            'description'=>$this->faker->sentence(),
            'sourceFile'=>'sourceFile.pdf',
            'written_on'=>now(),
            'img'=>'user1.png',
            'book_category_id'=>$this->faker->randomElement($bookCategoryId)

        ];
    }
}
