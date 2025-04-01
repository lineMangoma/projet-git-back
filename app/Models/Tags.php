<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function articles(){
        return $this->belongsToMany(Article::class,'article_tag');
    }
}
