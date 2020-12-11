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
                'kode' => '01',
                'parent_kode' => '#',
            ], [
                'name' => 'Settings',
                'url' => '#',
                'icon' => 'mdi mdi-tools mr-2',
                'kode' => '02',
                'parent_kode' => '#',
            ], [
                'name' => 'Features',
                'url' => 'admin.features',
                'icon' => null,
                'kode' => '02.01',
                'parent_kode' => '02',
            ], [
                'name' => 'Users',
                'url' => 'admin.users',
                'icon' => null,
                'kode' => '02.02',
                'parent_kode' => '02',
            ], [
                'name' => 'Categories',
                'url' => 'admin.categories',
                'icon' => 'mdi mdi-folder-zip mr-2',
                'kode' => '03',
                'parent_kode' => '#',
            ], [
                'name' => 'Posts',
                'url' => 'admin.posts',
                'icon' => 'mdi mdi-newspaper mr-2',
                'kode' => '04',
                'parent_kode' => '#',
            ],
        ]);
    }
}
