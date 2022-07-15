<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name' => 'Scott Mangles',
            'email' => 'admin@smathletic.co.uk',
            'email_verified_at' => now(),
            //'role' => 'admin',
            'password' => Hash::make('SMAthletic1!'),
            'mobile' => '07538400748',
            'sub_contractor' => 1,
            'vehicle_make' => 'Saab',
            'vehicle_reg' => 'LB06 VLD',
            'cscs_number' => null,
            'remember_token' => Str::random(10),
        ]);

        $admin->save();
    }
}
