<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Job::create(['name' => 'Murid SD/SDLB/MI']);

        Job::create(['name' => 'Murid SMP/SMPLB/MTS']);

        Job::create(['name' => 'Murid SMA/SMALB/MA/SMK']);

        Job::create(['name' => 'Mahasiswa/Mahasiswi']);

        Job::create(['name' => 'Karyawan Swasta']);

        Job::create(['name' => 'Pegawai Negeri Sipil']);

        Job::create(['name' => 'Masyarakat Umum']);
    }
}
