<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Zainal Hasan',
            'email' => 'mail@zhanang.id',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123')
        ]);

        $this->call(CategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductLinksTableSeeder::class);
    }
}
