<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'photo',
        'content',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'article_tag');
    }

    public function vues()
    {
        return $this->hasMany(Vue::class);

    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
