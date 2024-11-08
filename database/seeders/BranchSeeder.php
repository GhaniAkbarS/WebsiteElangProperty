<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data cabang menggunakan model Branch
        Branch::create([
            'title' => 'Elang Property Pekanbaru',
            'slug' => 'cabang-pusat',
            'phone' => '12098',
            'address' => 'Jl. Amal Mulia',
        ]);

        Branch::create([
            'title' => 'Elang Property Jakarta',
            'slug' => 'cabang-jakarta',
            'phone' => '39747424',
            'address' => 'Jl. Disana',
        ]);

        Branch::create([
            'title' => 'Elang Property Bandung',
            'slug' => 'cabang-jakarta',
            'phone' => '39747424',
            'address' => 'Jl. Disitu',
        ]);
    }
}
