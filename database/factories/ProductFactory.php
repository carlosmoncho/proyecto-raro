<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $precio = $this->faker->randomFloat(2, 1, 100 );
        return [
            'name' => $this->faker->name(),
            'original_price' => $precio,
            'discount_price' => $precio - $precio * 0.10,
            'sale' => $this->faker->boolean(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'img' => 'https://empresas.blogthinkbig.com/wp-content/uploads/2019/11/Imagen3-245003649.jpg?w=800',
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
