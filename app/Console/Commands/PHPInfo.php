<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PHPInfo extends Command
{
    protected $signature = 'dumps:phpinfo';

    protected $description = 'Dump PHPInfo';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds phpinfo');

        ds()->phpinfo();
    }
}
