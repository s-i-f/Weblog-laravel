<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(2, 7),
            'category_id' => mt_rand(1, 10),
            'name' => fake()->sentence(),
            'slug' => fake()->slug(),
            'excerpt' => fake()->sentence() ,
            'body' => fake()->paragraph(),
            'is_premium' => mt_rand(0, 1),
        ];
    }
}
