<?php

namespace Database\Seeders;

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
        Product::factory(250)->create()->each(function ($product){

            $product->Likes()->attach($this->randomArray());
        });
    }

    public function randomArray(){
        $offers = random_int(0,100);
        $arrayUsersId = [];
        for ($i = 0; $i < $offers; $i++){
            $userIdRandom = random_int(1,500);
            $arrayUsersId[$userIdRandom] = $userIdRandom;
        }
        return $arrayUsersId;
    }
}
