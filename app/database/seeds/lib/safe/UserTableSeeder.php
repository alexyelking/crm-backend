<?php

namespace database\seeds\lib\safe;

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', '=','public@example.user')->exists()) {
            factory(User::class)->create(['name'=>"exampleUser",'email'=>"public@example.user"]);
        }
    }
}
