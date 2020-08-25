<?php
namespace App\Views\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;

class NavigationComposer
{
    public function compose(View $view)
    {
        $this->composeCategories($view);
        
        $this->composeTags($view);

        $this->composePopularPost($view);
        
        $this->composePopularPostf($view);
        
        $this->composeArchives($view);

        $this->composeSetting($view);
        $this->composeEvent($view);

    }

    private function composeEvent(View $view)
    {
        $events =  Event::latest()->get();
        $view->with('events', $events);
    }
    private function composeSetting(View $view)
    {
        $settings =  Setting::orderBy('title', 'asc')->get();
        $view->with('settings', $settings);
    }

    private function composePopularPost(View $view)
    {
        $popularPosts =  Post::published()->popular()->take(3)->get();
        $view->with('popularPosts', $popularPosts);
    }
    
    private function composePopularPostf(View $view)
    {
        $popularPostsf =  Post::published()->popular()->take(2)->get();
        $view->with('popularPostsf', $popularPostsf);
    }

    private function composeCategories(View $view)
    {
        $categories =  Category::with(['posts'=> function($query){
                    $query->published();
        }])->orderBy('title', 'asc')->get();
        $view->with('categories', $categories);
    }

    private function composeTags(View $view)
    {
        // ambil semua tags yang memiliki relasi dengan post
        $tags = Tag::has('posts')->get();

        //lewatkan semua tags ke dalam view
        $view->with('tags', $tags);
    }
    //composer view untuk slider
    private function composeArchives(View $view)
    {
        // function static ada di model Post function archive
        $archives = Post::archives();

        $view->with('archives', $archives);
    }

}
