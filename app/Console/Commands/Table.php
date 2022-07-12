<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Table extends Command
{
    protected $signature = 'ds:table';

    protected $description = 'Dump Table';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds table');

        ds()->table(User::all(['id', 'name']), 'users');

        ds()->table(User::all(['id', 'name']), 'users on s models')->toScreen('Models');
    }
}
