<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Colors extends Command
{
    protected $signature = 'dumps:colors {--screen}';

    protected $description = 'Dump Colors';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds colors');

        if ($this->option('screen')) {
            config(['laradumps.send_color_in_screen' => true]);
        }

        $this->line('ds danger');
        ds(['a' => 1, 'b' => 2])->danger()->label('danger');

        $this->line('ds info');
        ds(['a' => 1, 'b' => 2])->info()->label('info');

        $this->line('ds success');
        ds(['a' => 1, 'b' => 2])->success()->label('success');

        $this->line('ds dark');
        ds(['a' => 1, 'b' => 2])->dark()->label('dark');

        $this->line('ds warning');
        ds(['a' => 1, 'b' => 2])->warning()->label('warning');

        $this->line('ds custom color');
        ds(['a' => 1, 'b' => 2])->color('violet')->label('violet');

        $this->line('ds custom color');
        ds(['a' => 1, 'b' => 2])->color('bg-violet-500')->label('violet-500');
    }
}
