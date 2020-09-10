<?php

use database\seeds\lib\ClientsTableSeeder;
use database\seeds\lib\ClientsAdditionalTableSeeder;
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

        // Письма для пользователей
        $this->call(EmailTableSeeder::class);

        // Обязательные клиенты
        $this->call(ClientsTableSeeder::class);

        // Дополнительные клиенты для показа
        $this->call(ClientsAdditionalTableSeeder::class);
    }
}
