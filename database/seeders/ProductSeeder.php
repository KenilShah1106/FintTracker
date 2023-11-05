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
    }
}
