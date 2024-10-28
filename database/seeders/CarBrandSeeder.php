<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarBrand; // pastikan nama model sudah benar

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan model CarBrand untuk memasukkan data
        CarBrand::insert([
            ['title' => 'Toyota'],
            ['title' => 'Honda'],
            ['title' => 'Nissan'],
            ['title' => 'BMW'],
            ['title' => 'Mercedes-Benz'],
        ]);
    }
}
