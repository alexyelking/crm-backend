<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(User::class)->create(['email'=>"123@123.123"]);
        factory(User::class)->create(['email'=>"a@a.a"]);
    }
}
