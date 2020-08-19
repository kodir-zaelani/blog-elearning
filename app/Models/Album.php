<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //mass assignment all field
    protected $guarded = [];

    //hasMany ke table atau Model Photo
    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
    
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        
        if ( ! is_null($this->image))
        {
            $directory = config('cms.image.directoryAlbums');
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
            $directory = config('cms.image.directoryAlbums');
            $ext       = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("{$directory}/" . $thumbnail);
        }
        
        return $imageUrl;
    }

}
