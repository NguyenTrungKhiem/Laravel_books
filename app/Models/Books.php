<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    public $timestamps = false; // set time to false
    // Đỗ dữ liệu vào
    protected $fillable = [
        'namebook', 'descbook' , 'category_id' , 'genre_id' , 'img_book', 'slug_book', 'activate_book'
    ];
    protected $primaryKey = 'id';
    protected $table = 'books'; // lấy dữ liệu từ bảng categories

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function chapter(){
        return $this->hasMany('App\Models\Chapter','book_id','id');
    }

    public function genre(){
        return $this->belongsTo('App\Models\Genre','genre_id','id');
    }

}
