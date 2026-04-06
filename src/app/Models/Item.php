<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'condition_id', 'name', 'price', 'brand', 'image', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_category');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function islikedBy($user): bool
    {
        if (!$user) return false;

        return $this->likedByUsers()->where('user_id', $user->id)->exists();
    }
    
    public function soldItem()
    {
        return $this->hasOne(SoldItem::class);
    }
    
    public function isSold()
    {
        return $this->soldItem()->exists();
    }
}
