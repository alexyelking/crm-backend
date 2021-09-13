<?php

namespace database\seeds\lib\fake;

use App\Client;
use Illuminate\Database\Seeder;

class ClientsAdditionalTableSeeder extends Seeder
{
    private $count;

    public function __construct($count = 50)
    {
        $this->count = $count;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, (int)$this->count)->create();
    }
}
