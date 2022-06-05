<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 0;

    public function increment()
    {
        $this->count++;
        $this->emitTo(Counter2::class, 'count', $this->count);
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
