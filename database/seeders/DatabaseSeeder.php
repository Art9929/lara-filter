<?php

namespace Database\Seeders;

use App\Models\AdminPanel;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

// Категории -> Товары

//        $products = Category::factory()
//            ->has(AdminPanel::factory()->count(5), 'products')
//            ->create();


// Товары -> Категории (создаёт новую категорию)

        $products = AdminPanel::factory()
            ->count(5)
            ->for(Category::factory(), 'categories')
            ->make();

        dd($products);
        // \App\Models\User::factory(10)->create();

    }
}
