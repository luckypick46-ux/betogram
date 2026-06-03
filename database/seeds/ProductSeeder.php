<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'title' => 'Pro Betting Guide',
            'price' => 29.00,
            'description' => 'In-depth strategy guide for advanced bettors.',
            'image' => asset('assets/front_end/images/p1.png'),
            'stock' => 999,
        ]);

        Product::create([
            'title' => 'Tactical Tee',
            'price' => 19.00,
            'description' => 'Premium cotton tee with Betogram logo.',
            'image' => asset('assets/front_end/images/p2.png'),
            'stock' => 999,
        ]);

        Product::create([
            'title' => 'Starter Pack',
            'price' => 9.99,
            'description' => 'Quick start tips and tools for new users.',
            'image' => asset('assets/front_end/images/p3.png'),
            'stock' => 999,
        ]);

        Product::create([
            'title' => 'Pro Cap',
            'price' => 15.00,
            'description' => 'Adjustable cap for everyday wear.',
            'image' => asset('assets/front_end/images/p4.png'),
            'stock' => 999,
        ]);

        Product::create([
            'title' => 'Collector Poster',
            'price' => 12.00,
            'description' => 'High-quality poster featuring strategies.',
            'image' => asset('assets/front_end/images/p5.png'),
            'stock' => 999,
        ]);
    }
}
