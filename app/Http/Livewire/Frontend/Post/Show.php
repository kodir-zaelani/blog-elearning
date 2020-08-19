<?php

namespace App\Http\Livewire\Frontend\Post;

use Livewire\Component;
use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;

class Show extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $post->increment('view_count');

        $this->post = $post;
    }
    
    public function render()
    {
        return view('livewire.frontend.post.show');
    }
}
