<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 13',
                'description' => 'Apple iPhone 13 - 256GB, Blue',
                'price' => 793.99,
                'quantity' => 20,
                'discount' => 15.00,
                'discount_expires_at' => null,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bookshelf',
                'description' => 'Large bookshelf with drawers',
                'price' => 199.99,
                'quantity' => 8,
                'discount' => 0.00,
                'discount_expires_at' => null,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sofa',
                'description' => 'Comfortable sofa',
                'price' => 299.99,
                'quantity' => 10,
                'discount' => 10.00,
                'discount_expires_at' => null,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Office Chair',
                'description' => 'Ergonomic office chair',
                'price' => 151.99,
                'quantity' => 15,
                'discount' => 5.00,
                'discount_expires_at' => null,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PC Gamer',
                'description' => 'High-end gaming PC',
                'price' => 30000.00,
                'quantity' => 5,
                'discount' => 20.00,
                'discount_expires_at' => null,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'iPhone 14 Pro Max',
                'description' => 'Latest iPhone model',
                'price' => 600.00,
                'quantity' => 12,
                'discount' => 15.00,
                'discount_expires_at' => null,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bookshelf Deluxe',
                'description' => 'Premium bookshelf with glass doors',
                'price' => 299.99,
                'quantity' => 7,
                'discount' => 10.00,
                'discount_expires_at' => null,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smart TV',
                'description' => '4K Ultra HD Smart TV',
                'price' => 1200.00,
                'quantity' => 6,
                'discount' => 25.00,
                'discount_expires_at' => null,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);

        // Récupère les IDs générés automatiquement
        $productIds = DB::table('products')->pluck('id', 'name');

        // Récupère tous les fichiers images du dossier storage/app/public/product-images
        $storageImages = Storage::disk('public')->files('product-images');

        // Associe chaque image à un produit (en boucle, si plus d'images que de produits, recommence)
        $images = [];
        $productNames = array_keys($productIds->toArray());
        $productCount = count($productNames);
        $i = 0;
        foreach ($storageImages as $imgPath) {
            $productName = $productNames[$i % $productCount];
            $images[] = [
                'product_id' => $productIds[$productName],
                'image_path' => $imgPath,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $i++;
        }

        DB::table('product_images')->insert($images);
    }
}
