<?php

namespace database\seeds\lib;

use Illuminate\Database\Seeder;
use App\Email;
use App\User;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'public@user.example')->first();
        $user->emails()->saveMany(factory(Email::class, mt_rand(10, 20))->make());

        $user = User::where('email', '123@123.123')->first();
        $user->emails()->saveMany(factory(Email::class, mt_rand(10, 20))->make());

        $user = User::where('email', 'a@a.a')->first();
        $user->emails()->saveMany(factory(Email::class, mt_rand(10, 20))->make());

    }
}
