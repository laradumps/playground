<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Simple extends Command
{
    protected $signature = 'dumps:simple';

    protected $description = 'Simple';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds simple');

        $var1 = 'Hello World';

        ds($var1);
    }
}
