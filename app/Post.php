<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'category_id', 'description', 'published_at', 'image_link', 'slug',
    ];

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
    
    public function getImageLinkAttribute($image_link)
    {
        return asset($image_link);
    }

    // This affects the population of edit view
    // So other db fields should be consider for this
    // public function getContentAttribute($content)
    // {
    //     return str_limit($content, 100);
    // }

    // public function getTitleAttribute($title)
    // {
    //     return str_limit($title, 30);
    // }

    protected $dates = ['deteled_at'];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany(Category::class);
    }
}
