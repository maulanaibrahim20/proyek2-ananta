<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'no_tlp' => '0886789',
            'alamat' => 'chellange',
            'password' => bcrypt('password'),
            'role_id' => '1',
        ]);
        User::create([
            'name' => 'owner',
            'username' => 'owner',
            'email' => 'owner@gmail.com',
            'no_tlp' => '0895323255',
            'alamat' => 'indramayu',
            'password' => bcrypt('password'),
            'role_id' => '2',
        ]);

        User::create([
            'name' => 'client',
            'username' => 'client',
            'email' => 'sclient@gmail.com',
            'no_tlp' => '08953232476',
            'alamat' => 'indramayu',
            'password' => bcrypt('password'),
            'role_id' => '3',
        ]);
    }
}
