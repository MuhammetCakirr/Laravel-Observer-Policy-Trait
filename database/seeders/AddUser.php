<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 123456;
        User::query()->create(
            [
                'name' => 'Muhammet Çakır',
                'email' => 'mami@gmail.com',
                'password' => Hash::make($password),

            ]
        );

        User::query()->create(
            [
                'name' => 'Mustafa Çakır',
                'email' => 'musti@gmail.com',
                'password' => Hash::make($password),

            ]
        );
    }
}
