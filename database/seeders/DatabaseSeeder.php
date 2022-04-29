<?php

namespace Database\Seeders;

use App\Models\AdminPanel;
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
        // Create - добавляет в базу

        $products = AdminPanel::factory(10)->make();
        dd($products);
        // \App\Models\User::factory(10)->create();

    }
}
