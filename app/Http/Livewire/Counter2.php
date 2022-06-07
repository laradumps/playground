<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Livewire\Component;

class Counter2 extends Component
{
    public int $count2 = 0;

    protected $listeners = [
        'count',
    ];

    public function count(int $count)
    {
        $this->count2 = $count * $count;
    }

    public function render(): View|Factory|Application
    {
        return view('livewire.counter2');
    }
}
