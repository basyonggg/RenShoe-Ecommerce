<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Nike Pegasus',
            'price' => 150.00,
            'quantity' => 100,
            'category_id' => 1,
            'brand_id' => 1,
            'description' => 'the Nike Pegasus 41 is a versatile everyday training shoe with a nice mix of cushioning, comfort, and durability. A great choice for new, novice and casual runners who are seeking a model that can do most things well at an affordable price.'

        ]);
    }
}
