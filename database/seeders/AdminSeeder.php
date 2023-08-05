<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin Delipat",
            "email" => "delipat@mail.com",
            "password" => Hash::make("12345"),
            "slug" => "admin-delipat",
      
        ]);
    }
}
