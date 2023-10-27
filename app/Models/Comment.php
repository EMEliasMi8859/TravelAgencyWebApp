<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = [
        'name',
        'email',
        'website',
        'comment',
        'blog_id'
       
     
    ];
    public function BlogPost()
    {
        return $this->belongsTo(Blog::class);
    }
}
