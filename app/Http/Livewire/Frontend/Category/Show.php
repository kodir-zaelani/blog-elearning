<?php

namespace App\Http\Livewire\Frontend\Category;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    /**
     * public variable
     */
    public $segment;
    public $category_title;
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

        $category = Category::where('slug', $this->segment)->first();
        // $this->category_title    = $category->title;

            $posts = $category->posts()
            // Post::where('category_id', $category->id)
                    ->with('author', 'tags')
                    ->latestFirst()
                    ->published()
                    ->paginate($this->perPage);
            
            return view('livewire.frontend.category.show', compact('posts'));
    }
}
