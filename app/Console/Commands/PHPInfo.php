<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PHPInfo extends Command
{
    protected $signature = 'dumps:phpinfo';

    protected $description = 'Dump PHPInfo';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds phpinfo');

        ds()->phpinfo();
    }
}
