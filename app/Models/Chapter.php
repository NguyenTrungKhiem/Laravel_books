<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = false; // set time to false
    // Đỗ dữ liệu vào
    protected $fillable = [
        'book_id', 'number_chapter', 'title' , 'descchapter' , 'contentchapter', 'activate_chapter', 'slug_chapter'
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter'; // lấy dữ liệu từ bảng categories

    public function book(){
        return $this->belongsTo('App\Models\Books');
    }
}
