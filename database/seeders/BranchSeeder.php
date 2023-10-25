<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Branch::insert([
            [
                'name' => 'IDN Jonggol Ikhwan',
            ],
            [
                'name' => 'IDN Jonggol Akhwat',
            ],
            [
                'name' => 'IDN Sentul',
            ],
        ]);
    }
}
