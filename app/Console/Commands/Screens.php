<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Screens extends Command
{
    protected $signature = 'dumps:screens';

    protected $description = 'Dump Screens';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds screens');

        ds('screen 1');

        ds('{"0":"luan"}')
            ->isJson()
            ->label('format json')
            ->toScreen('api');

        ds('screen 2')
            ->s('screen 2');

        ds3('screen 3');

        ds4('screen 4');

        ds5('screen 5');
    }
}
