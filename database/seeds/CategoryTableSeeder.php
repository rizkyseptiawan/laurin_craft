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
            'slug' => 'PRT tempurung kelapa',
            'name' => 'Peralatan Rumah Tangga',
        ]);
        Category::create([
            'slug' => 'Aksesoris terbuat dari tempurung kelapa',
            'name' => 'Aksesoris',
        ]);
    }
}
