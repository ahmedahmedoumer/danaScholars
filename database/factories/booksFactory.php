<?php

namespace Database\Factories;
use App\models\bookCategory;
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
        $id=bookCategory::pluck('id');
        return [
            //
            'book_name'=>$this->faker->name(),
            'author'=>$this->faker->name(),
            'description'=>$this->faker->sentence(),
            'sourceFile'=>'sourceFile.pdf',
            'written_on'=>now(),
            'img'=>'user1.png',
            'book_category_id'=>$this->faker->randomElement($id)

        ];
    }
}
