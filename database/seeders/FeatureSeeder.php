<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::insert(array(
            ['name' => 'Dashboard', 'url' => 'admin', 'icon' => 'mdi mdi-view-dashboard mr-2'],
            ['name' => 'Settings', 'url' => '#', 'icon' => 'mdi mdi-tools mr-2', 'childrens' => array(
                ['name' => 'Features', 'url' => 'admin.features'],
                ['name' => 'User', 'url' => 'admin.users'],
            )],
            ['name' => 'Categories', 'url' => 'admin.categories', 'icon' => 'mdi mdi-folder-zip mr-2'],
            ['name' => 'Posts', 'url' => 'admin.posts', 'icon' => 'mdi mdi-newspaper mr-2'],
        ));
    }
}
