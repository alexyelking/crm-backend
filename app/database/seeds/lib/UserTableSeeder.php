<?php

namespace database\seeds\lib;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Общий пользователь
        User::updateOrCreate(
            ['email' => "public@user.example"],
            ['name' => "Public User", 'password' => Hash::make("123123")]
        );

        // Общий пользователь
        User::updateOrCreate(
            ['email' => "123@123.123"],
            ['name' => "Alexandr Elkin User", 'password' => Hash::make("123123")]
        );

        // Общий пользователь
        User::updateOrCreate(
            ['email' => "a@a.a"],
            ['name' => "Alexey Korol User", 'password' => Hash::make("123123")]
        );
    }
}
