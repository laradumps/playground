<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Model extends Command
{
    protected $signature = 'dumps:model';

    protected $description = 'Model';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds model');

        ds()->model(User::query()->first());
    }
}
