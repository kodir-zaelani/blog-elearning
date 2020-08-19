<?php

namespace App\Http\Livewire\Frontend\Post;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $date = Carbon::now();
        $posts = Post::with('author', 'tags', 'category')
                    ->latest()
                    // ->published()
                    ->filter(request()->only(['term', 'year', 'month']))
                    ->take(6)
                    // ->paginate($this->limit);
                    ->get();
        return view('livewire.frontend.post.index', compact('posts'));
    }
}
