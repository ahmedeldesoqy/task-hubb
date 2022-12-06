<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'title' => 'title one',
                'desc' => 'desc one',
                'price' => 150,
            ],
            [
                'title' => 'title two',
                'desc' => 'desc two',
                'price' => 200,
            ],
            [
                'title' => 'title three',
                'desc' => 'desc three',
                'price' => 250,
            ],
        ]);
    }
}
