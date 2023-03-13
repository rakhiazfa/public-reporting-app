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
            'name' => 'Presiden dan Wakil Presiden',
            'user_id' => User::factory()->state([
                'name' => 'Presiden dan Wakil Presiden',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Dewan Perwakilan Rakyat',
            'user_id' => User::factory()->state([
                'name' => 'Dewan Perwakilan Rakyat',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Majelis Perwakilan Rakyat',
            'user_id' => User::factory()->state([
                'name' => 'Majelis Perwakilan Rakyat',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Mahkamah Konstitusi',
            'user_id' => User::factory()->state([
                'name' => 'Mahkamah Konstitusi',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Mahkamah Agung',
            'user_id' => User::factory()->state([
                'name' => 'Mahkamah Agung',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Badan Pemeriksa Keuangan',
            'user_id' => User::factory()->state([
                'name' => 'Badan Pemeriksa Keuangan',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Tegal',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Tegal',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Semarang',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Semarang',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan DKI Jakarta',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan DKI Jakarta',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        //

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Bandung',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Bandung',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kab Sumedang',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kab Sumedang',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kab Cimahi',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kab Cimahi',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Provinsi Jawa Barat',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Provinsi Jawa Barat',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Pontianak',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Pontianak',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Bekasi',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Bekasi',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Bogor',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Bogor',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kab Sukabumi',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kab Sukabumi',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kab Cianjur',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kab Cianjur',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Kota Diponorogo',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Kota Diponorogo',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();

        // 

        $agency = Agency::create([
            'name' => 'Pemerintahan Provinsi Bali',
            'user_id' => User::factory()->state([
                'name' => 'Pemerintahan Provinsi Bali',
                'role_id' => 2
            ])->create()->id,
        ]);

        AgencyLocation::factory()->state(['agency_id' => $agency->id])->create();
    }
}
