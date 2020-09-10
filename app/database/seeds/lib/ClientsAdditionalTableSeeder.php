<?php

namespace database\seeds\lib;

use Illuminate\Database\Seeder;
use App\Client;

class ClientsAdditionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, (int)env('FAKE_CLIENTS'))->create();
    }
}
