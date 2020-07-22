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
            ['name' => ''],
            ['name' => 'bold'],
            ['name' => 'italic'],
            ['name' => 'underline'],
        ];

        Style::insert($styles);
    }
}
