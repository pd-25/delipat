<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_infos')->insert([
            'slug' => 'delipat-site',
            'address' => 'Admin-d',
            'phone' => '3430993232',
            'email' => 'delipat@mail.com'
        ]);
    }
}
