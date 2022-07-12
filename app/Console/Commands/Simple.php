<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Simple extends Command
{
    protected $signature = 'ds:simple';

    protected $description = 'Simple';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds simple');

        $var = 'Hello World';

        ds($var);
    }
}
