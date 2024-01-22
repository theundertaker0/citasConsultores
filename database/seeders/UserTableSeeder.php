<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'theundertaker0',
                'email' => 'amadeusdigital@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('Mosamos@0'),
                'title' => 'Licenciado en sistemas',
                'address'=> 'C 82 #158A',
                'phone' => '9999999999',
                'role' => 'admin',
            ]
        );

        User::factory()
        ->count(50)
        ->create();
    }
}
