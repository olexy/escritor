<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'category_id', 'image_link', 'slug',
    ];
    
    public function getImageLinkAttribute($image_link)
    {
        return asset($image_link);
    }

    public function getContentAttribute($content)
    {
        return str_limit($content, 100);
    }

    public function getTitleAttribute($title)
    {
        return str_limit($title, 30);
    }

    protected $dates = ['deteled_at'];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
