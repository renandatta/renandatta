<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Renandatta',
            'email' => 'renan@gmail.com',
            'password' => Hash::make('4rt1s4n'),
            'email_verified_at' => now(),
        ]);
    }
}
