<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zainal Hasan',
            'email' => 'mail@zhanang.id',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
        ]);
        $user->assignRole('User');
        $user2 = User::create([
            'name' => 'Admin Laurinda',
            'email' => 'laurindacraft@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
        ]);
        $user2->assignRole('Admin');
    }
}
