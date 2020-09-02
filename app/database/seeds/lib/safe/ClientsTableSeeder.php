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
        if (!Client::where('email', '=','public@example.user')->exists()) {
            factory(Client::class)->create(['name'=>"AlexeyKorol",'email'=>"dontremember@forvie.me"]);
        }

        // Александр
        if (!Client::where('email', '=','newmanforlife@list.ru')->exists()) {
            factory(Client::class)->create(['name'=>"AlexandrElkin",'email'=>"newmanforlife@lis.ru", 'phone'=>"89502177622"]);
        }
    }
}
