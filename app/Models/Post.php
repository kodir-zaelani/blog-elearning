<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // agar published_at diterjemahkan sebagai object Carbon maka buat
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $dates = ['created_at'];

    ///mass assignment all field
    protected $guarded = [];

    //belongsTo table atau Model User
    public function author()
    {
        return $this->belongsTo('App\User');
    }
    
    //belongsTo table atau Model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //belongsToMany ke table atau Model Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //change default date view
    public function getCreatedAtAttribute($date)
    {   
        // return Carbon::parse($date)->format('d-M-Y');
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->diffForHumans();
    }

    // public function getCreatedAtAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['created_at'])
    //     ->format('d, M Y H:i');
    // }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        
        if ( ! is_null($this->image))
        {
            $directory = config('cms.image.directoryPosts');
            $imagePath = public_path() . "/{$directory}/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $this->image);
        }
        
        return $imageUrl;
    }
    
    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";
        
        if ( ! is_null($this->image))
        {
            $directory = config('cms.image.directoryPosts');
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
        }
        
        return $imageUrl;
    }

    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach($this->tags as $tag) {
            $anchors[] = '<a href="' .route('tag.show', $tag->slug) . '">' . $tag->title . '</a>';
        }
        return implode(", ", $anchors);
    }
    
    public function getStatusLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">Draft</span>';
        }
        return '<span class="badge badge-success">Publish</span>';
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    
    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('status' , 1);
    }

    public static function archives()
    {
        if (env('DB_CONNECTION') == 'pgsql')
        {
            return static::selectRaw('count(id) as post_count, extract(year from created_at) as year, extract(month from created_at) as month')
            ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
        }
        else
        {
            return static::selectRaw('count(id) as post_count, year(created_at) year, month(created_at) month')
            ->published()
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
        }
    }

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['month']) && $month = $filter['month'])
        {
            if (env('DB_CONNECTION') == 'pgsql') {
                $query->whereRaw('extract(month from created_at) = ?', [$month]);
            }
            else {
                $query->whereRaw('month(created_at) = ?', [$month]);
            }
        }
        
        if (isset($filter['year']) && $year = $filter['year'])
        {
            if (env('DB_CONNECTION') == 'pgsql') {
                $query->whereRaw('extract(year from created_at) = ?', [$year]);
            }
            else {
                $query->whereRaw('year(created_at) = ?', [$year]);
            }
        }
        
        // check if any term entered
        if (isset($filter['term']) && $term = strtolower($filter['term']))
        {
            $query->where(function($q) use ($term) {
                $q->whereHas('author', function($qr) use ($term) {
                        $qr->where('name', 'LIKE', "%{$term}%");
                    });
                    $q->orWhereHas('category', function($qr) use ($term) {
                            $qr->where('title', 'LIKE', "%{$term}%");
                        });
                        $q->orWhereHas('tags', function($qr) use ($term) {
                            $qr->where('name', 'LIKE', "%{$term}%");
                        });
                        $q->orWhereRaw('LOWER(title) LIKE ?', ["%{$term}%"]);
                        $q->orWhereRaw('LOWER(content) LIKE ?', ["%{$term}%"]);
             });
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
