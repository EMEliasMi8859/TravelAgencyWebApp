<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'blog_pic',
        'user_id',
        'b_category_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function bCategory()
    {
        return $this->belongsTo(BCategory::class);
    }

}
