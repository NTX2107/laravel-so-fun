<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = Category::all();
        for ($i = 1; $i <= 15; $i++) {
            if ($i <= 3) {
                $product['name'] = fake()->name;
                $product['quantity'] = fake()->randomNumber(3);
                $product['code'] = $categories[0]['code'].fake()->postcode();
                $product['price'] = fake()->randomNumber(6);
                $product['images'] = fake()->imageUrl();
                $product['detail'] = fake()->sentence();
                $product['description'] = fake()->sentence();
                $product['category_id'] = $categories[0]['id'];
                Product::updateOrCreate($product);
            } elseif ($i <= 6) {
                $product['name'] = fake()->name;
                $product['quantity'] = fake()->randomNumber(3);
                $product['code'] = $categories[1]['code'].fake()->postcode();
                $product['price'] = fake()->randomNumber(6);
                $product['images'] = fake()->imageUrl();
                $product['detail'] = fake()->sentence();
                $product['description'] = fake()->sentence();
                $product['category_id'] = $categories[1]['id'];
                Product::updateOrCreate($product);
            } elseif ($i <= 10) {
                $product['name'] = fake()->name;
                $product['quantity'] = fake()->randomNumber(3);
                $product['code'] = $categories[2]['code'].fake()->postcode();
                $product['price'] = fake()->randomNumber(6);
                $product['images'] = fake()->imageUrl();
                $product['detail'] = fake()->sentence();
                $product['description'] = fake()->sentence();
                $product['category_id'] = $categories[2]['id'];
                Product::updateOrCreate($product);
            } else {
                $product['name'] = fake()->name;
                $product['quantity'] = fake()->randomNumber(3);
                $product['code'] = $categories[3]['code'].fake()->postcode();
                $product['price'] = fake()->randomNumber(6);
                $product['images'] = fake()->imageUrl();
                $product['detail'] = fake()->sentence();
                $product['description'] = fake()->sentence();
                $product['category_id'] = $categories[3]['id'];
                Product::updateOrCreate($product);
            }
        }
    }
}
