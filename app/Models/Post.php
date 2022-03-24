<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    // this eliminates the n+1 problem (queries):
    protected $with = ['category', 'author'];

    // protected $fillable = ['title', 'excerpt', 'body', 'id'];

    public function scopeFilter($query, array $filters) 
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) => 
            $query->where(fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            )
        );  //so all the posts can be visibile even if we type on search something from the body

        $query->when($filters['category'] ?? false, fn ($query, $category) => 
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category)
            ) 
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) => 
            $query->whereHas('author', fn ($query) => 
                $query->where('username', $author)
            ) 
        );
    }

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
}
