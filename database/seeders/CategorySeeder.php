<?php

namespace Database\Seeders;

use App\Enums\CategoryCode;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lst = [
            [
                'name' => 'House Ware',
                'code' => CategoryCode::HOUSE_WARE,
            ],
            [
                'name' => 'Kid\'s Toy',
                'code' => CategoryCode::KID_TOY,
            ],
            [
                'name' => 'Food',
                'code' => CategoryCode::FOOD,
            ],
            [
                'name' => 'Electrical Component',
                'code' => CategoryCode::ELECTRICAL_COMPONENTS,
            ],
        ];
        //load
        foreach ($lst as $c) {
            $c['thumbnail'] = fake()->imageUrl();
            $c['detail'] = fake()->sentence();
            $c['description'] = fake()->sentence();
            Category::updateOrCreate($c);
        }
    }
}
