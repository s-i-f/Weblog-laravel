<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'thumbnail',
        'slug',
        'excerpt',
        'body',
        'is_premium'
    ];

    public function scopeFilter($query, array $filters)
    {   
        if ($filters['search'] ?? false){
            $query  
                ->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('excerpt', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        };
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments()  {
        return $this->hasMany(Comment::class);
    }
}
