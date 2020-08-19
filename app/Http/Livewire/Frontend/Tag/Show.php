<?php

namespace App\Http\Livewire\Frontend\Tag;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    /**
    * public variable
    */
    public $segment;
    public $tag_name;
    public $perPage  = 6;
    
    /**
    * mount or construct function
    */
    public function mount(Request $request)
    {
        $this->segment = $request->segment(2);
    }
    
    public function render()
    {
        $tag = Tag::where('slug', $this->segment)->first();
            $posts =$tag->posts() 
            // Post::where('tag_id', $tag->id)
            ->with('category', 'author')
            ->latestFirst()
            ->published()
            ->paginate($this->perPage);
        $tag_name    = $tag->title;
        return view('livewire.frontend.tag.show', compact('posts','tag_name'));
            
    }
}
    