<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'Pet parent dashboard',
                'row' => '3',
                'column' => '1',
                'styling' => '',
                'color' => 'black',
            ],
            [
                'name' => 'Pet care dashboard',
                'row' => '2',
                'column' => '3',
                'styling' => '',
                'color' => 'black',
            ],
            [
                'name' => 'petotum.com',
                'row' => '1',
                'column' => '2',
                'styling' => '',
                'color' => 'black',
            ],
            [
                'name' => 'Provide Transparency',
                'row' => '4',
                'column' => '4',
                'styling' => '',
                'color' => 'black',
            ],
            [
                'name' => 'Build Trust',
                'row' => '1',
                'column' => '4',
                'styling' => '',
                'color' => 'black',
            ],
        ]);
        
    }
}
