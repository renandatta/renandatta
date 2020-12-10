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
        $categories = Category::factory(15)->create();
        foreach ($categories as $category) {
            Post::factory(5)->create(['category_id' => $category->id]);
        }
    }
}
