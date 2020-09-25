<?php

use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'category_id'  => 1,
            'user_id' => User::first()->id,
            'general_price'  => 10000,
            'name' => 'Cangkir Tempurung Kelapa',
            'image_path'  => 'storage/images/cangkir.jpg',
            'description'  => 'Cangkir ini merupakan buatan tangan asli dari batok kelapa',
        ]);
        Product::create([
            'category_id'  => 2,
            'user_id' => User::first()->id,
            'general_price'  => 7000,
            'name' => 'Kalung Tempurung Kelapa',
            'image_path'  => 'storage/images/kalung.jpg',
            'description'  => 'Kalung ini merupakan buatan tangan asli dari batok kelapa',
        ]);
        Product::create([
            'category_id'  => 1,
            'user_id' => User::first()->id,
            'general_price'  => 12000,
            'name' => 'Mangkok Tempurung Kelapa',
            'image_path'  => 'storage/images/mangkok.jpg',
            'description'  => 'Mangkok ini merupakan buatan tangan asli dari batok kelapa',
        ]);
        Product::create([
            'category_id'  => 2,
            'user_id' => User::first()->id,
            'general_price'  => 25000,
            'name' => 'Lampion Tempurung Kelapa',
            'image_path'  => 'storage/images/lampion.jpg',
            'description'  => 'Lampion ini merupakan buatan tangan asli dari batok kelapa',
        ]);
        Product::create([
            'category_id'  => 1,
            'user_id' => User::first()->id,
            'general_price'  => 6000,
            'name' => 'Sendok Tempurung Kelapa',
            'image_path'  => 'storage/images/sendok.jpg',
            'description'  => 'Sendok ini merupakan buatan tangan asli dari batok kelapa',
        ]);
        Product::create([
            'category_id'  => 1,
            'user_id' => User::first()->id,
            'general_price'  => 5000,
            'name' => 'Gelang kelapa',
            'image_path'  => 'storage/images/gelang.jpg',
            'description'  => 'Gelang ini merupakan buatan tangan asli dari batok kelapa',
        ]);
    }
}
