<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Quiet extends Command
{
    protected $signature = 'ds:quiet';

    protected $description = 'Dump Quiet';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds quiet');

        dsq($this);
    }
}
