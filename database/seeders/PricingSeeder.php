<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    

        \App\Models\Program::create([
        'title' => 'Reguler Class',
        'price' => 200000,
        'duration' => 'pertemuan',
        'features' => ['24 Pertemuan', 'Modul Digital', 'Sertifikat'],
        'is_featured' => true,
        'is_active' => true,
        ]);
    }
}
