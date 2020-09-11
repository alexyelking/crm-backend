<?php

namespace database\seeds\lib;

use Illuminate\Database\Seeder;
use App\Email;
use App\User;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()
            ->has('emails', '<', '10')
            ->chunk(100, function ($rows) {
                foreach ($rows as $row) {
                    $row->emails()->saveMany(factory(Email::class, mt_rand(10,20))->make());
                }
            });
    }
}
