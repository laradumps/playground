<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Contains extends Command
{
    protected $signature = 'dumps:contains';

    protected $description = 'Dump Contains';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds contains (false)');
        ds('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quidem?')
            ->contains('muspi')
            ->label('does\'n contains');

        $this->line('ds contains');
        ds('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quidem?')
            ->contains('lorem')
            ->label('contains');

        $this->line('ds contains');
        ds('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quidem?')
            ->contains('Lorem')
            ->label('contains');
    }
}
