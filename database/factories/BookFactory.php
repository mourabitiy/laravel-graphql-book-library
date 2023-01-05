<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'language' => $this->faker->randomElement(['fr', 'en', 'de', 'es', 'it', 'ar']),
            //I want a random category from the array
            'category' => $this->faker->randomElement(['fiction', 'non-fiction', 'biography', 'poetry', 'drama', 'science', 'history', 'philosophy', 'religion', 'self-help', 'travel', 'children', 'young-adult', 'teen', 'comics', 'graphic-novels', 'manga', 'horror', 'thriller', 'romance', 'science-fiction', 'fantasy', 'mystery', 'crime', 'humor', 'cookbooks', 'diaries', 'journals', 'memoirs', 'art', 'photography', 'music', 'film', 'entertainment', 'business', 'economics', 'finance', 'health', 'fitness', 'sports', 'parenting', 'relationships', 'pets', 'education', 'language', 'reference', 'science', 'technology', 'engineering', 'mathematics', 'social-sciences', 'law', 'medicine', 'nature', 'astronomy', 'geography', 'anthropology', 'archaeology', 'art', 'architecture', 'design', 'fashion', 'food', 'drink', 'gardening', 'home', 'crafts', 'hobbies', 'travel', 'holiday', 'guides', 'humor', 'literature', 'comics', 'graphic-novels', 'manga', 'poetry', 'drama', 'art', 'photography', 'music', 'film', 'entertainment', 'business', 'economics', 'finance', 'health', 'fitness', 'sports', 'parenting', 'relationships', 'pets', 'education', 'language', 'reference', 'science', 'technology', 'engineering', 'mathematics', 'social-sciences', 'law', 'medicine', 'nature', 'astronomy', 'geography', 'anthropology', 'archaeology', 'art', 'architecture', 'design', 'fashion', 'food', 'drink', 'gardening', 'home', 'crafts', 'hobbies', 'travel', 'holiday', 'guides', 'humor', 'literature', 'comics', 'graphic-novels', 'manga', 'poetry', 'drama', 'art', 'photography', 'music', 'film', 'entertainment', 'business', 'economics']),
            'page_count' => $this->faker->numberBetween(100, 1000),
            'publisher' => $this->faker->company(),
            'isbn' => $this->faker->isbn13(),
        ];
    }
}
