<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class All extends Command
{
    protected $signature = 'dumps:all';

    protected $description = 'All Dumps';

    protected Collection $commands;

    public function handle(): void
    {
        $this->artisanCommands();

        $this->commands->each(function ($command) {
            $this->call($command);
            $this->runNext($command);
        });
    }

    private function runNext($command): void
    {
        if ($command != $this->commands->last()) {
            $this->ask('Press <ENTER> to run the next command...');
        }
    }

    private function artisanCommands(): void
    {
        $this->commands = collect(Artisan::all())
            ->keys()
            ->filter(function ($command) {
                return str($command)->startsWith('dumps:') && $command != $this->signature;
            });
    }
}
