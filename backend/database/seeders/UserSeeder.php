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
     *
     * @return void
     */
    public function run()
    {
        //

        $user = new User([
            'name' => 'Admin',
            'email' => 'admin@example.co.id',
            'username' => 'admin',
            'password' => Hash::make('q1w2e3r4t5y6'),
        ]);

        $user->role()->associate(1);

        $user->save();
    }
}
