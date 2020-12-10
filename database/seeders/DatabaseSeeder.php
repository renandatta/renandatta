<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(FeatureSeeder::class);
        $this->call(UserSeeder::class);
        $categories = Category::factory(10)->create();
        foreach ($categories as $category) {
            Post::factory(rand(10, 30))->create(['category_id' => $category->id]);
        }
    }
}
