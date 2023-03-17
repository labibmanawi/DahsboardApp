<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index) {
            DB::table('products')->insert ([
                'code' => $index ,
                'name' => $faker->word(15),
                'stock' => rand(1,10),
                'varian' => $faker->word(10),
                'description' => $faker->sentence(10),
                'category_id' => rand(1,5)
            ]);
        }
        
    }
}
