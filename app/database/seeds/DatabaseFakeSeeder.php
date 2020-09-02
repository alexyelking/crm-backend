<?php

use database\seeds\lib\fake\ClientsTableSeeder;
use database\seeds\lib\fake\UserTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseFakeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
