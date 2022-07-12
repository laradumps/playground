<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Queries extends Command
{
    protected $signature = 'ds:query';

    protected $description = 'Dump Queries';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds query');

        config(['laradumps.send_queries' => true]);

        ds()->queriesOn('User model');

        User::firstWhere('email', 'you@email.com');

        ds()->queriesOff();

        config(['laradumps.send_queries' => false]);

        User::query()
            ->where('id', 1)
            ->ds()
            ->first();
    }
}
