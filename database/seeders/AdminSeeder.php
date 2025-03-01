<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'birthdate' =>'2000-01-01',
            'phone'=>'08123456789',
            'address' => 'Jl. Contoh, No. 123, Jakarta Selatan',
            'gender' => 'male',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@example',
            'password' => Hash::make('password'),
            'role' => 'user',
            'birthdate' =>'2000-01-01',
            'phone'=>'08123456789',
            'address' => 'Jl. Contoh, No. 123, Jakarta Selatan',
            'gender' => 'female',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
    }
}
