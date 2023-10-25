<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branch = \App\Models\Branch::where('name', 'IDN Jonggol Ikhwan')->first();
        $programTkj = \App\Models\Program::where('name', 'TKJ')->first();
        $programRpl = \App\Models\Program::where('name', 'RPL')->first();
        $programDkv = \App\Models\Program::where('name', 'DKV')->first();
        $programSmp = \App\Models\Program::where('name', 'SMP')->first();

        $branch->programs()->attach([
            $programTkj->id => ['quota' => 2],
            $programRpl->id => ['quota' => 2],
            $programDkv->id => ['quota' => 2],
            $programSmp->id => ['quota' => 2],
        ]);

        $branch = \App\Models\Branch::where('name', 'IDN Jonggol Akhwat')->first();
        $branch->programs()->attach([
            $programRpl->id => ['quota' => 5],
            $programDkv->id => ['quota' => 5],
            $programSmp->id => ['quota' => 5],
        ]);

        $branch = \App\Models\Branch::where('name', 'IDN Sentul')->first();
        $branch->programs()->attach([
            $programTkj->id => ['quota' => 3],
            $programRpl->id => ['quota' => 3],
            $programDkv->id => ['quota' => 3],
            $programSmp->id => ['quota' => 3],
        ]);
    }
}
