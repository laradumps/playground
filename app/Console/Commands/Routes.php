<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Routes extends Command
{
    protected $signature = 'dumps:route';

    protected $description = 'Dump Routes';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds routes');

        ds()->routes();

        ds()->routes('sanctum', 'api')->label('With excepts: sanctum / api');
    }
}
