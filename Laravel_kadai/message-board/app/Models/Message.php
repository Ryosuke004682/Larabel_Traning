<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    //多対一のリレーション
    public function users() {
        return $this->belongsTo(User::class);
    }

    //MessageとLikeの一対多のリレーション
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //Userとの多対多のリレーション
    public function likeUsers()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }
}
