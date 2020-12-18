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
        Feature::insert([
            [
                'name' => 'Dashboard',
                'url' => 'admin',
                'icon' => 'mdi mdi-view-dashboard mr-2',
                'code' => '01',
                'parent_code' => '#',
            ], [
                'name' => 'Settings',
                'url' => '#',
                'icon' => 'mdi mdi-tools mr-2',
                'code' => '02',
                'parent_code' => '#',
            ], [
                'name' => 'Profile',
                'url' => 'admin.profiles',
                'icon' => null,
                'code' => '02.01',
                'parent_code' => '02',
            ], [
                'name' => 'Features',
                'url' => 'admin.features',
                'icon' => null,
                'code' => '02.02',
                'parent_code' => '02',
            ], [
                'name' => 'Users',
                'url' => 'admin.users',
                'icon' => null,
                'code' => '02.03',
                'parent_code' => '02',
            ], [
                'name' => 'Categories',
                'url' => 'admin.categories',
                'icon' => 'mdi mdi-folder-zip mr-2',
                'code' => '03',
                'parent_code' => '#',
            ], [
                'name' => 'Posts',
                'url' => 'admin.posts',
                'icon' => 'mdi mdi-newspaper mr-2',
                'code' => '04',
                'parent_code' => '#',
            ],
        ]);
    }
}
