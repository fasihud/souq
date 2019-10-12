<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'p_name' => 'HP Pavilion 15',
            'image' => 'https://azcd.harveynorman.com.au/media/catalog/product/cache/21/image/992x558/9df78eab33525d08d6e5fb8d27136e95/h/p/hp-pavilion-x15-cw1031-15-inch-laptop-6yz23pa.jpg',
            'price' => 1190,
            'category' => 'Laptop'
        ]);

        DB::table('products')->insert([
            'p_name' => 'Acer E5',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/61Yeir0uhIL._SL1322_.jpg',
            'price' => 990,
            'category' => 'Laptop'
        ]);

        DB::table('products')->insert([
            'p_name' => 'Hp Omen',
            'image' => 'https://rukminim1.flixcart.com/image/704/704/computer/h/r/v/hp-notebook-original-imaerrztavgfbzmk.jpeg?q=70',
            'price' => 2500,
            'category' => 'Laptop'
        ]);

        DB::table('products')->insert([
            'p_name' => 'Dell Inspiron 15',
            'image' => 'https://www.bdstall.com/asset/product-image/giant_82279.jpg',
            'price' => 2000,
            'category' => 'Laptop'
        ]);

    }
}
