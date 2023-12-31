<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create();
        \App\Models\scholars::factory(100)->create();
        \App\Models\askedQuestions::factory(30)->create();
        \App\Models\bookCategory::factory(30)->create();
        \App\Models\books::factory(100)->create();
        \App\Models\institution::factory(50)->create();
        \App\Models\scholarsInstitute::factory(300)->create();
        \App\Models\awards::factory(100)->create();
        \App\Models\educationCategories::factory(30)->create();
        \App\Models\educationDetails::factory(50)->create();
        \App\Models\instituteAwards::factory(100)->create();


        



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
