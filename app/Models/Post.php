<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;



    use SoftDeletes;
// Table name (if different from convention)
protected $table = 'blog_posts';
// Primary key (if not 'id')
protected $primaryKey = 'post_id';
// Disable timestamps
public $timestamps = false;
// Fillable attributes (mass assignment)
protected $fillable = [
'title', 'content', 'user_id', 'status',
];
// Hidden attributes (API/JSON)
protected $hidden = [
'deleted_at', 'secret_note',
];
// Type casting
protected $casts = [
'published_at' => 'datetime',
'options' => 'array',
'is_featured' => 'boolean',
];
// Query scope
public function scopePublished($query)
{
return $query->where('status', 'published');}
// Local scope with parameter
public function scopeOfCategory($query, $category)
{
return $query->where('category_id', $category);
}

public function user()
{
return $this->belongsTo(User::class);
}
// Has many comments
public function comments()
{
return $this->hasMany(Comment::class);
}
// Polymorphic relationship
public function tags()
{
return $this->morphToMany(Tag::class, 'taggable');}
}
