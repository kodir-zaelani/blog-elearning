<?php

namespace App\Http\Livewire\Frontend\Slider;

use App\Models\Slider;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $sliders = Slider::where('status', 1)
                            ->latest()
                            ->take(4)
                            ->get();
        
        return view('livewire.frontend.slider.index', compact('sliders'));
    }
}
