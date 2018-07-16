<?php

use Illuminate\Database\Seeder;

class HoroscopesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horoscopes')->insert([
            'title' => str_random(10),
            'sign_id' => rand(1,15),
            'short_description' => str_random(30),
            
        ]);
    }
}
