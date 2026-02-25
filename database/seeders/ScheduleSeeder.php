<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Schedule::create(['time_range' => '16:30 - 17:30', 'is_active' => true]);
        \App\Models\Schedule::create(['time_range' => '18:30 - 20:00', 'is_active' => true]);
    }
}
