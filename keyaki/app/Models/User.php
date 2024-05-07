<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }

    
    public function likeBooks() {
        //belongsToMany : 多対多の関係を定義するやつ
        //withTimestamps : likesテーブルのcreated_atと、updated_atの２つのタイムスタンプが更新される。

        return $this->belongsToMany(Book::class , 'likes')->withTimestamps();
        //belongsToMany(中間テーブルを通じて取得したい対象のクラス , どのテーブル使うか)
    }

    public function isLike($book_id) {
        return $this->likeBooks()->where('books.id' ,  $book_id)->exists();
    }
}
