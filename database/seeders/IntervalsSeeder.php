<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intervals = [];

        for ($i = 0; $i < 10000; $i++) {
            $start = rand(1, 10000);
            $end = rand($start + 1, 1000000);

            $intervals[] = [
                'start' => $start,
                'end' => $end,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('intervals')->insert($intervals);
    }
}
