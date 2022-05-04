<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminPanel>
 */
class AdminPanelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => 'ZSPR20',
            'price' => '100',
            'weight' => '20',
            'description' => 'Описание',
            'profile_image' => 'storage/Белый_квадрат.jpg',
            'product_id' => '1',


        ];
    }
}
