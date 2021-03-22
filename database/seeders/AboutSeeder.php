<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'name' => 'Ad Soyad',
            'shortdescription' => 'Kısa Açıklama',
            'description' => 'Bize kendinizden bahsedin',
        ]);
    }
}
