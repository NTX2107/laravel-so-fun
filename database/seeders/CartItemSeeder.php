<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 20;
        $maxProductsCreated = 15;
        $maxCartsCreated = 10;
        while ($count > 0) {
            $cartItem['product_id'] = rand(1, $maxProductsCreated);
            $cartItem['cart_id'] = rand(1, $maxCartsCreated);
            CartItem::updateOrCreate($cartItem);
            $count--;
        }
    }
}
