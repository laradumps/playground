<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Diff extends Command
{
    protected $signature = 'dumps:diff';

    protected $description = 'Dump Diff';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds diff');

        ds()->diff('This is an example text', 'This is an example of content');

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

        ds()->diff($array1, $array2, true);
    }
}
