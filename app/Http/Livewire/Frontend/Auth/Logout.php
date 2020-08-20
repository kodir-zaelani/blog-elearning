<?php

namespace App\Http\Livewire\Frontend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    /**
     * 
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('root');
    }
    
    public function render()
    {
        return view('livewire.frontend.auth.logout');
    }
}
