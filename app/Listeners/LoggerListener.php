<?php

namespace App\Listeners;

use App\Events\Logger;

class LoggerListener
{
    public function handle(Logger $event)
    {
        logger()->debug('Oláa');
    }
}
