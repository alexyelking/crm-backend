<?php

namespace database\seeds\lib\safe;

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
    }
}
