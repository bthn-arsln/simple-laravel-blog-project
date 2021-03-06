<?php

namespace Database\Seeders;

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
        \App\Models\User::insert([
            'firstname' => 'Batuhan',
            'lastname' => 'Arslan',
            'email' => 'bthnarsln64@gmail.com',
            'type' => 'admin',
            'status' => 'active',
            'gender' => 'male',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        \App\Models\User::factory(10)->create();
    }
}
