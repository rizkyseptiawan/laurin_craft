<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Peralatan Rumah Tangga',
        ]);
        Category::create([
            'name' => 'Aksesoris',
        ]);
    }
}
