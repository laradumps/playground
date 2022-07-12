<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Label extends Command
{
    protected $signature = 'ds:label';

    protected $description = 'Label Screens';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds label');

        ds([0 => 'Luan'])->label('array');

        ds(collect([0 => 'Luan']))->label('collect');

        ds('string')->label('string');

        ds($this)->label('label class');
    }
}
