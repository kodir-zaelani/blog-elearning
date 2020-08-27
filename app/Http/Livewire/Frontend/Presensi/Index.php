<?php

namespace App\Http\Livewire\Frontend\Presensi;

use Livewire\Component;
use App\Models\Participant;

class Index extends Component
{
   
    public function render()
    {
        $participants = Participant::orderBy('id','desc')->when(request()->q, function($participants) {
            $participants = $participants->where('nik', 'like', '%'. request()->q . '%');
        })->take(1)->get();
        
        return view('livewire.frontend.presensi.index', compact('participants'));
    }
}
