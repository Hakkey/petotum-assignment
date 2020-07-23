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
            ['name' => 'dark'],
            ['name' => 'primary'],
            ['name' => 'success'],
            ['name' => 'danger'],

        ];

        Color::insert($colors);
    }
}
