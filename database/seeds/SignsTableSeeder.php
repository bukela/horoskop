<?php

use Illuminate\Database\Seeder;

class SignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('signs')->insert([
            'name' => str_random(10),
            'slug' => str_random(10),
            'period' => str_random(10),
            'horoscope_groups_id' => rand(1,15),
            
        ]);
    }
}
