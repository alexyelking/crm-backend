<?php

use database\seeds\lib\fake\ClientsAdditionalTableSeeder;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    private $count;

    public function __construct($count)
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
        (new ClientsAdditionalTableSeeder($this->count))->run();
    }
}
