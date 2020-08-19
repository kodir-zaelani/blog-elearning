<?php

namespace App\Http\Livewire\Frontend\Portfolio;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $albums = Album::latest()->take(6)->get();
        $photos = Photo::latest()->take(12)->get();
        return view('livewire.frontend.portfolio.index', compact('photos', 'albums'));
    }
}
