<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false; // set time to false
    // Đỗ dữ liệu vào
    protected $fillable = [
        'namecategory', 'slug_category' , 'desccategory' , 'activate'
    ];
    protected $primaryKey = 'id';
    protected $table = 'categories'; // lấy dữ liệu từ bảng categories

    public function book(){
        return $this->hasMany('App\Models\Books');
    }
}
