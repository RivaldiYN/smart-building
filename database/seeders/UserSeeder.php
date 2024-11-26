<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = [
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'roles_id' => 1,
                'password' => Hash::make('securepassword123'),
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'nama' => 'Operator',
                'email' => 'operator@gmail.com',
                'roles_id' => 2,
                'password' => Hash::make('securepassword123'),
                'created_at'=> now(),
                'updated_at'=> now()
            ]
        ];
        User::query()->insert($user);
    }
}
