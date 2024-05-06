<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    //一気に複数カラムへの代入を許可する、または禁止する設定をしておく「$fillable」と「$guarded」プロパティ
    //今回は複数代入可能な$fillableを採用
    protected $fillable = ['title' , 'author' , 'publisher' , 'review'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
