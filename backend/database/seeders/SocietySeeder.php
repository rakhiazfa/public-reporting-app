<?php

namespace Database\Seeders;

use App\Models\SocietyLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocietyLocation::factory()->count(50)->create();
    }
}
