<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        $maxUsersCreated = 10;
        while ($count > 0) {
            $cart['user_id'] = rand(1, $maxUsersCreated);
            Cart::updateOrCreate($cart);
            $count--;
        }
    }
}
