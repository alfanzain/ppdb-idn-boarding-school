<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Program::insert([
            [
                'name' => 'TKJ',
            ],
            [
                'name' => 'RPL',
            ],
            [
                'name' => 'DKV',
            ],
            [
                'name' => 'SMP',
            ],
        ]);
    }
}
