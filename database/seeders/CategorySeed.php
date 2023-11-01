<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate = [
            [
                'nama' => 'Plastik',
                'harga_kg' => '5000'
            ],
            [
                'nama' => 'Kertas',
                'harga_kg' => '3000'
            ],
            [
                'nama' => 'Logam',
                'harga_kg' => '7000'
            ],
            [
                'nama' => 'Kaca',
                'harga_kg' => '6000'
            ],
        ];
        foreach ($cate as $key => $p) {
            Category::create([
                'nama' => $p['nama'],
                'harga_kg' => $p['harga_kg'],
            ]);
        }
    }
}
