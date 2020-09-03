<?php

namespace database\seeds\lib\safe;

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
            ['name' => "Example User", 'password' => Hash::make("123123")]
        );
    }
}
