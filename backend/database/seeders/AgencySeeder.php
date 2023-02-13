<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\AgencyLocation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Bandung',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Bandung',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Semarang',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Semarang',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Tegal',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Tegal',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();
    }
}
