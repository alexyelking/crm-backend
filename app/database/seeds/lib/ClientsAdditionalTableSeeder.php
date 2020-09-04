<?php

namespace database\seeds\lib;

use App\Client;
use Illuminate\Database\Seeder;

class ClientsAdditionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 10)->create();
    }
}
