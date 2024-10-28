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
            'title' => 'Cabang Pusat',
            'slug' => 'cabang-pusat',
            'phone' => '12098',
            'address' => 'Jl. Amal Mulia',
        ]);

        Branch::create([
            'title' => 'Cabang Jakarta',
            'slug' => 'cabang-jakarta',
            'phone' => '39747424',
            'address' => 'Jl. Disana',
        ]);
    }
}
