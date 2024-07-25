<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
    "title" ,
    "image",
    "description",
    'category_id',
    'user_id' ,
    ];
    public function user(){
        return $this->belongsTo(User::class );
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
