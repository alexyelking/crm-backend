<?php

namespace database\seeds\lib;

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Алексей
        Client::updateOrCreate(
            ['email' => "kemiiep.omck@mail.ru", 'phone' => "89236989630"],
            ['name' => "Alexey Korol"]
        );

        // Александр
        Client::updateOrCreate(
            ['email' => "newmanforlife@list.ru", 'phone' => "89502177622"],
            ['name' => "Alexandr Elkin"]
        );

        factory(Client::class, 10)->create();
    }
}
