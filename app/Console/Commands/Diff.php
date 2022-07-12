<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Diff extends Command
{
    protected $signature = 'ds:diff';

    protected $description = 'Dump Diff';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds diff');

        ds('This is an example text')->diff('This is an example text 2', true);

        $array1 = [
            'name'      => 'Luan',
            'last_name' => 'Freitas',
            'is_active' => false,
        ];

        $array2 = [
            'name'      => 'Luan',
            'last_name' => 'Freitas',
            'is_active' => true,
        ];

        ds($array1)->diff($array2, false);
    }
}
