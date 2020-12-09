<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Renandatta',
            'email' => 'renan@gmail.com',
            'password' => Hash::make('4rt1s4n'),
            'email_verified_at' => now(),
        ]);
        $categories = Category::factory(10)->create();
        foreach ($categories as $category) {
            Post::factory(rand(10, 30))->create(['category_id' => $category->id]);
        }
    }
}
