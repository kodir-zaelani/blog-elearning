<?php

namespace App\Http\Livewire\Frontend\Slider;

use App\Models\Slider;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        // try {
        //     //jika benar
            
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return abort(404);
        // }
        $sliders = Slider::where('status', 1)
                            ->latest()
                            ->take(4)
                            ->get();
            return view('livewire.frontend.slider.show', compact('sliders'));
        
    }
}
