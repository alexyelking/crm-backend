<?php

use database\seeds\lib\ClientsTableSeeder;
use database\seeds\lib\EmailTableSeeder;
use database\seeds\lib\UserTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Обязательные пользователи
        $this->call(UserTableSeeder::class);

        // Официант, всем письма, за мой счёт!
        $this->call(EmailTableSeeder::class);

        // Обязательные клиенты
        $this->call(ClientsTableSeeder::class);
    }
}
