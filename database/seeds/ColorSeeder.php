<?php

use App\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['name' => 'black'],
            ['name' => 'blue'],
            ['name' => 'green'],
            ['name' => 'red'],

        ];

        Color::insert($colors);
    }
}
