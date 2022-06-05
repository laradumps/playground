<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Validation extends Command
{
    protected $signature = 'dumps:validation';

    protected $description = 'Dump Validation';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds Json');

        $movies = Http::get('https://api.tvmaze.com/search/people?q=lauren');
        ds($movies->body())
            ->isJson()
            ->label('Valid JSON');

        $this->line('ds invalid json');
        ds('{"}')->isJson()
            ->label('Invalid JSON');

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
