<?php

use App\Style;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = [
            ['name' => 'normal'],
            ['name' => 'bold'],
            ['name' => 'light'],
            ['name' => 'italic'],
        ];

        Style::insert($styles);
    }
}
