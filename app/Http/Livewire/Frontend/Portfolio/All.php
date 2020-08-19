<?php

namespace App\Http\Livewire\Frontend\Portfolio;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;

class All extends Component
{
    public function render()
    {
        $albums = Album::latest()->get();
        $photos = Photo::latest()->get();
        return view('livewire.frontend.portfolio.all', compact('photos', 'albums'));
    }
}
