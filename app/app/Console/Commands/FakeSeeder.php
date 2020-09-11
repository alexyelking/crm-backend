<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FakeSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:fake {count=50}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Зафейкать базу данных';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new \FakeSeeder($this->argument('count')))->run();
        return 0;
    }
}
