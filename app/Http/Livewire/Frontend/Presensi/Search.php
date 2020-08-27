<?php

namespace App\Http\Livewire\Frontend\Presensi;

use Livewire\Component;
use App\Models\Participant;
use Illuminate\Http\Request;

class Search extends Component
{
    public $search;

    protected $updatesQueryString = ['q'];

    public function mount(Request $request)
    {
        $this->search = $request->get('q');
        
        if ($this->search == "")
        {
            return redirect()->route('presensi.search');
        }
    }

    public function render()
    {
        $participants = Participant::where('nik', 'like', '%'. $this->search . '%')->get();
    
        return view('livewire.frontend.presensi.search', compact('participants') );
    }
}
