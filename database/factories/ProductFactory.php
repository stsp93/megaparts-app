<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(random_int(5,15)),
            'description' => fake()->text(random_int(20,100)),
            'price' => fake()->numberBetween(20,1000),
            'imageUrl' => fake()->randomElement([
                'https://www.sunwayautoparts.com/wp-content/uploads/2021/08/car-led-lights.jpg',
                'https://cdn11.bigcommerce.com/s-sadnl5b01a/images/stencil/584x584/products/377/2387/f142825377__97488.1672958234.jpg?c=1',
                'https://s.alicdn.com/@sc04/kf/Hd2e0b7ed64d94ba8a88755e335817e11o.png_300x300.jpg',
                'https://5.imimg.com/data5/SELLER/Default/2022/1/XW/UG/YQ/3811314/motolamp-head-light-assy-tata-407-nm-1052a--500x500.JPG'
            ]),
        ];
    }
}
