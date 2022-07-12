<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 0;

    protected function getRules(): array
    {
        return [
            'count' => 'numeric|min:30',
        ];
    }

    public function save()
    {
        $this->validate();

        $this->count++;
        $this->emitTo(Counter2::class, 'count', $this->count);
    }

    public function event()
    {
        $this->emit('test:event', ['name' => 'Luan']);
    }

    public function browserEvent()
    {
        $this->dispatchBrowserEvent('dispatchBrowserEvent', ['test' => true]);
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
