<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id' => Str::ulid()->toString(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(3, True),
            'author' => $this->faker->name,
            'published' => $this->faker->boolean

        ];
    }
}
