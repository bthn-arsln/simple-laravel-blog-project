<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::insert([
            'name' => 'Batuhan Arslan',
            'email' => 'bthnarsln64@gmail.com',
            'type' => 'superadmin',
            'status' => 'approved',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        \App\Models\Admin::factory(10)->create();
    }
}
