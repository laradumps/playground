<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Logs extends Command
{
    protected $signature = 'dumps:log';

    protected $description = 'Dump Log';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds logs');

        config(['laradumps.send_log_applications' => true]);

        Log::info('Your message info', ['0' => 'Your Context']);

        Log::warning('Your message warning', ['0' => 'Your Context']);

        Log::error('Your message error', ['0' => 'Your Context']);

        Log::info('Your message info', ['0' => 'Your Context']);

        config(['laradumps.send_log_applications' => false]);
    }
}
