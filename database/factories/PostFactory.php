<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'category_id' => $category_id ?? null,
            'name' => $this->faker->catchPhrase,
            'date' => $this->faker->dateTimeThisYear->format('Y-m-d'),
            'image' => $this->faker->image(storage_path('app/posts'), 800, 600),
            'tags' => join(',', explode(' ', $this->faker->sentence(rand(3, 8)))),
            'content' => $this->faker->paragraph(rand(10, 20))
        ];
    }
}
