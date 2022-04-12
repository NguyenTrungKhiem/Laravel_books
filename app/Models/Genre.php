<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false; // set time to false
    // Đỗ dữ liệu vào
    protected $fillable = [
        'namegenre', 'slug_genre' , 'descgenre' , 'activate_genre'
    ];
    protected $primaryKey = 'id';
    protected $table = 'genre'; // lấy dữ liệu từ bảng categories

    public function book(){
        return $this->hasMany('App\Models\Books');
    }
}
