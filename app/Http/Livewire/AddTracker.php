<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTracker extends Component
{
    public $tracker;

    public function render()
    {
        return view('livewire.add-tracker');
    }

    public function mount()
    {
        $this->tracker = 'Productive';
    }
}
