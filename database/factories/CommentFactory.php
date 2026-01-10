<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            // Ensure this key is 'id' to match the migration fix above
            'id' => (string) Str::ulid(), 
            'author' => $this->faker->name(),
            'content' => $this->faker->paragraph(),
            'post_id' => Post::factory(), 
        ];
    }
}