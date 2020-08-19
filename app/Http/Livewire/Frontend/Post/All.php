<?php

namespace App\Http\Livewire\Frontend\Post;

use Livewire\Component;
use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    public $perPage = 6;
    public $term;

    protected $updatesQueryString = ['term'];

    public function mount()
    {
        $this->term = request()->query('term', $this->term);
    }

    public function render()
    {
        $posts = Post::with('author', 'category', 'tags')
                            ->latestFirst()
                            ->published()
                            ->filter(request()->only(['term', 'year', 'month']))
                            ->paginate($this->perPage);
            return view('livewire.frontend.post.all', compact('posts'));
        // try {
        //     //jika benar
        //     $posts = Post::with('author', 'category', 'tags', 'comments')
        //                     // ->latestFirst()
        //                     // ->published()
        //                     ->filter(request()->only(['term', 'year', 'month']))
        //                     ->paginate($this->perPage);
        //     return view('livewire.frontend.post.all', compact('posts'));
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return abort(404);
        // }
    }
}
