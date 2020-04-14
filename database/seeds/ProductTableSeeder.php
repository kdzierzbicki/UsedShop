<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([

        'imagePath' => 'https://www.socium.pl/zdjecia/komputer-w-firmie.jpg' ,
        'title' => 'computer' ,
        'description' => 'super computer' ,
        'price' => '1100' ,

    ]);

        $product -> save() ;

        $product = new \App\Product([

            'imagePath' => 'https://www.socium.pl/zdjecia/komputer-w-firmie.jpg' ,
            'title' => 'computer' ,
            'description' => 'super computer' ,
            'price' => '1200' ,

        ]);

        $product -> save();

        $product = new \App\Product([

        'imagePath' => 'https://www.socium.pl/zdjecia/komputer-w-firmie.jpg' ,
        'title' => 'computer' ,
        'description' => 'super computer' ,
        'price' => '1600' ,

    ]);

        $product -> save() ;

    }
}
