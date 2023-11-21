<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => "Earbuds",
            'description' => "Truly wireless earbuds with amazing sound quality",
            'image_path' => 'https://images.unsplash.com/photo-1606220588913-b3aacb4d2f46?auto=format&fit=crop&q=80&w=1770&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 2500,
        ]);
        Product::create([
            'name' => "50% off coupon",
            'description' => "Get 50% off on your next purchase of any clothing item",
            'image_path' => 'https://gumlet.assettype.com/Prabhatkhabar/2021-01/c0bdb0a8-5a8f-4aa2-8f12-1c1ba42388a7/myntra_old_logo.jpg?auto=format%2Ccompress&w=1200',
            'price' => 1500,
        ]);
        Product::create([
            'name' => "Mousepad",
            'description' => "A mousepad with a cool design",
            'image_path' => 'https://images.unsplash.com/photo-1625842269025-dc4640c2523e?auto=format&fit=crop&q=80&w=1770&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 1000,
        ]);

        Product::create([
            'name' => "FLAT 25% off voucher",
            'description' => "Get 25% off on your next purchase of any item on Amazon",
            'image_path' => 'https://hdqwalls.com/wallpapers/amazon-4k-logo-qhd.jpg',
            'price' => 500,
        ]);
        Product::create([
            'name' => "Smartwatch",
            'description' => "A smartwatch with a cool design",
            'image_path' => 'https://images.unsplash.com/photo-1617625802912-cde586faf331?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 8000,
        ]);
        Product::create([
            'name' => "Thermos Bottle",
            'description' => "A durable Thermos bottle, perfect for maintaining the temperature of your beverages for extended periods",
            'image_path' => 'https://images.unsplash.com/photo-1648919725390-1eec35fdf32c?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 2500,
        ]);
        Product::create([
            'name' => "Keyboard cover",
            'description' => "A durable keyboard cover that protects from dust and spills, with clear markings for easy typing",
            'image_path' => 'https://images.unsplash.com/photo-1542435503-956c469947f6?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 900,
        ]);
        Product::create([
            'name' => "Trimmer",
            'description' => "A high-quality trimmer for precise grooming",
            'image_path' => 'https://images.unsplash.com/photo-1614095431984-d5f26e5c99f7?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 3500,
        ]);
    }
}
