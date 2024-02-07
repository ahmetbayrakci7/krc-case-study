<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')->insert([
            [
                'name' => 'Vendor1',
                'api_url' => 'hhtp://vendor1.xml',
                'slug' => 'vendor1'
            ],
            [
                'name' => 'Vendor2',
                'api_url' => 'hhtp://vendor2.xml',
                'slug' => 'vendor2'
            ],
            [
                'name' => 'Vendor3',
                'api_url' => 'hhtp://vendor3.xml',
                'slug' => 'vendor3'
            ]
        ]);
    }
}
