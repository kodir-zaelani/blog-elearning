<?php

namespace App\Http\Livewire\Frontend\Event;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Http\Request;

class Show extends Component
{
    public $segment;

    public function mount(Request $request)
    {
        $this->segment = $request->segment(2);
    }

    
    public function render()
    {
        $event = Event::where('slug', $this->segment)->first();
        return view('livewire.frontend.event.show', compact('event'));
    }
}
