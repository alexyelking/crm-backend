<?php

use database\seeds\lib\ClientsTableSeeder;
use database\seeds\lib\ClientsAdditionalTableSeeder;
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
        // Обязательные юзеры/клиенты
        $this->call(UserTableSeeder::class);
        $this->call(ClientsTableSeeder::class);

        // Дополнительные клиенты для показа
        //$this->call(ClientsAdditionalTableSeeder::class);
    }
}
