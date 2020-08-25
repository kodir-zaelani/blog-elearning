<?php

namespace App\Http\Livewire\Frontend\Event;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $events = Event::where('status', 1)
        ->latest()
        ->take(5)
        ->get();
        return view('livewire.frontend.event.index', compact('events'));
    }
}
