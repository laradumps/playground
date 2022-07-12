<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\{Http, Log};

class Contains extends Command
{
    protected $signature = 'ds:contains';

    protected $description = 'Dump Contains';

    public function handle(): void
    {
        ds()->clear();

        $this->line('ds contains (false)');

        $json = '{"name":"Paulo", "city":"Marianatown"}';

        ds($json)->contains('Mariana'); //would produce ✅ Text contains

        $json = '{"name":"Haleth", "nature":"Elf"}';

        ds($json)->contains('elf'); //would produce ✅ Text contains

        $json = '{"name":"Mariana", "country":"Brazil"}';

        //Will not match "Brazil"
        ds($json)->contains('brazil', caseSensitive: true);

        //No match for "Maria" in "Mariana"
        ds($json)->contains('Maria', wholeWord: true);
    }
}
