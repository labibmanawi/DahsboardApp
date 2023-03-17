<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;
use Hash;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker:: create();
        foreach(range(1,10) as $index) {
            DB:: table('users') -> insert ([
                'name' => $faker->name(1,10),
                'email' => $faker->email(10),
                'password' => Hash::make('12345678')
            ]);
        }
    }
}

