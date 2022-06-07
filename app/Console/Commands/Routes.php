<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Routes extends Command
{
    protected $signature = 'dumps:route';

    protected $description = 'Dump Routes';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds routes');

        ds()->routes();

        ds()->routes('sanctum', 'api')->label('With excepts: sanctum / api');
    }
}
