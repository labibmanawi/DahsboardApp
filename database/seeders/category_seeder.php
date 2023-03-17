<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class category_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        foreach(range(1,5) as $index) {
            DB:: table('categories') -> insert ([
                'nama' => 'kategori '. $index
            ]);
        }
    }
}
