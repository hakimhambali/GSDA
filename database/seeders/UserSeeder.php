<?php

namespace Database\Seeders;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;

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
            'id' => '1',
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);
    }
}