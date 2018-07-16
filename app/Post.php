<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'slug','featured','user_id'
    ];

    protected $events = [
        'created' => Events\PostCreated::class 
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function scopePublished($query) {
        return $query->where('status', '=', 'published');
    }

    public function scopeUnpublished($query) {
        return $query->where('status', '=', 'unpublished');
    }

    public function scopeDraft($query) {
        return $query->where('status', '=', 'draft');
    }

    public function scopeSearch($query, $search) {
        return $query->where('title', 'LIKE', "%$search%");
    }


}
