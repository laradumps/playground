<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IsJson extends Command
{
    protected $signature = 'dumps:json';

    protected $description = 'Dump IsJson';

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
    }
}
