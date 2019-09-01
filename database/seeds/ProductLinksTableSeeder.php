<?php

use App\ProductLink;
use Illuminate\Database\Seeder;

class ProductLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductLink::create([
            'product_id' => 1,
            'name' => 'Tokopedia',
            'url' => 'http://tokopedia.com/laurincraft',
            'price' => '10000',
            'is_active' => 1,
        ]);
        ProductLink::create([
            'product_id' => 2,
            'name' => 'Tokopedia',
            'url' => 'http://tokopedia.com/laurincraft',
            'price' => '7000',
            'is_active' => 1,
        ]);
        ProductLink::create([
            'product_id' => 3,
            'name' => 'Tokopedia',
            'url' => 'http://tokopedia.com/laurincraft',
            'price' => '12000',
            'is_active' => 1,
        ]);
        ProductLink::create([
            'product_id' => 4,
            'name' => 'Tokopedia',
            'url' => 'http://tokopedia.com/laurincraft',
            'price' => '25000',
            'is_active' => 1,
        ]);
        ProductLink::create([
            'product_id' => 5,
            'name' => 'Tokopedia',
            'url' => 'http://tokopedia.com/laurincraft',
            'price' => '6000',
            'is_active' => 1,
        ]);
        ProductLink::create([
            'product_id' => 6,
            'name' => 'Tokopedia',
            'url' => 'http://tokopedia.com/laurincraft',
            'price' => '5000',
            'is_active' => 1,
        ]);
    }
}
