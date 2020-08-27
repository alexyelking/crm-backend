<?php

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
        Client::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 25; $i++) {
            Client::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
