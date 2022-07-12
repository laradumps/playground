<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Multiple extends Command
{
    protected $signature = 'ds:multiple';

    protected $description = 'Dump Multiple';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds multiple');

        ds(
            'multiple',
            'arguments',
            1,
            $this,
            ['first' => 'Luan', 'last' => 'Freitas']
        );
    }
}
