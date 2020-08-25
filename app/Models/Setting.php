<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //mass assignment all field
    protected $guarded = [];

    public function getLogoUrlAttribute($value)
    {
        $logoUrl = "";
        
        if ( ! is_null($this->logo))
        {
            $directory = config('cms.image.directoryPhotos');
            $imagePath = public_path() . "/{$directory}/" . $this->logo;
            if (file_exists($imagePath)) $logoUrl = asset("{$directory}/" . $this->logo);
        }
        
        return $logoUrl;
    }
    
    public function getLogoThumbUrlAttribute($value)
    {
        $logoUrl = "";
        
        if ( ! is_null($this->logo))
        {
            $directory = config('cms.image.directoryPhotos');
            $ext       = substr(strrchr($this->logo, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->logo);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $logoUrl = asset("{$directory}/" . $thumbnail);
        }
        
        return $logoUrl;
    }

    public function getFaviconUrlAttribute($value)
    {
        $faviconUrl = "";
        
        if ( ! is_null($this->favicon))
        {
            $directory = config('cms.image.directoryPhotos');
            $imagePath = public_path() . "/{$directory}/" . $this->favicon;
            if (file_exists($imagePath)) $faviconUrl = asset("{$directory}/" . $this->favicon);
        }
        
        return $faviconUrl;
    }
    
    public function getFaviconThumbUrlAttribute($value)
    {
        $logfaviconUrloUrl = "";
        
        if ( ! is_null($this->favicon))
        {
            $directory = config('cms.image.directoryPhotos');
            $ext       = substr(strrchr($this->favicon, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->favicon);
            $imagePath = public_path() . "/{$directory}/" . $thumbnail;
            if (file_exists($imagePath)) $faviconUrl = asset("{$directory}/" . $thumbnail);
        }
        
        return $faviconUrl;
    }
}
