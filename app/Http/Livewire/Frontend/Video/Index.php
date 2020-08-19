<?php

namespace App\Http\Livewire\Frontend\Video;

use App\Models\Video;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $videos = Video::latest()->take(6)->get();
        return view('livewire.frontend.video.index', compact('videos'));
    }
}
