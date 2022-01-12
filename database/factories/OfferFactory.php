<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product= Product::all()->random();
        DB::table('products')->where("id", $product->id)->update(["sale" => 1]);
        return [
            'accepted' => $this->faker->boolean(),
            'product_id' => $product->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'price' => $this->faker->randomFloat(2, 1, 100 ),
        ];
    }
}
