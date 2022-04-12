<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Genre;

class IndexController extends Controller
{
    public function home()
    {
        $category = Category::orderBy('id', 'desc')->get();
        $chapter = Chapter::orderBy('id', 'desc')->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $book = Books::orderBy('id', 'desc')->where('activate_book',0)->get();
        return view('pages.home')->with(compact('category', 'book', 'chapter','genre'));
    }
    public function book($slug)
    {
        $genre = Genre::orderBy('id', 'desc')->get();

        $category = Category::orderBy('id', 'desc')->get();
        $book = Books::with('category')->where('slug_book',$slug)->where('activate_book',0)->first();

        // Lấy ra các truyện có cùng danh mục
        $category_same = Books::with('category')->where('category_id',$book->category->id)->whereNotIn('id',[$book->id])->where('activate_book',0)->get();

        $chapter = Chapter::with('book')->where('book_id',$book->id)->orderBy('id', 'desc')->get();

        // Đọc chapter đầu tiên
        $chapter_first = Chapter::with('book')->orderBy('id', 'asc')->where('book_id',$book->id)->first();

        return view('pages.book')->with(compact('book','category','chapter','category_same','chapter_first','genre'));

    }
    public function category($slug)
    {
        $genre = Genre::orderBy('id', 'desc')->get();

        $category = Category::orderBy('id', 'desc')->get();

        // Lấy ra dữ liệu 1 hàng trong bảng category THÔNG qua cột slug_category
        $category_id = Category::where('slug_category', $slug)->first();
        $name_category = $category_id->namecategory;
        $book = Books::orderBy('id', 'desc')->where('activate_book',0)->where('category_id',$category_id->id)->get();
        $chapter = Chapter::orderBy('id', 'desc')->get();

        return view('pages.category')->with(compact('book','category','chapter','category_id','genre','name_category'));
    }
    public function genre($slug)
    {
        $genre = Genre::orderBy('id', 'desc')->get();

        $category = Category::orderBy('id', 'desc')->get();

        // Lấy ra dữ liệu 1 hàng trong bảng category
        $genre_id = Genre::where('slug_genre', $slug)->first();
        $name_genre = $genre_id->namegenre;
        $book = Books::orderBy('id', 'desc')->where('activate_book',0)->where('genre_id',$genre_id->id)->get();
        $chapter = Chapter::orderBy('id', 'desc')->get();

        return view('pages.genre')->with(compact('book','category','chapter','genre','name_genre'));
    }

    public function chapter($slug)
    {
        $genre = Genre::orderBy('id', 'desc')->get();

        $category = Category::orderBy('id', 'desc')->get();

        //Lấy ra dữ liệu 1 hàng trong bảng chapter THÔNG qua cột slug_chapter
        $book = Chapter::where('slug_chapter',$slug)->first();

        // lấy ra dữ liệu của chapter sau
        $chapter_next = Chapter::where('book_id',$book->book_id)->where('id', '>', $book->id)->min('id');

        // lấy ra dữ liệu của chapter trước
        $chapter_previous = Chapter::where('book_id',$book->book_id)->where('id', '<', $book->id)->max('id');
        //Kết nối với dữ liệu bảng book
        $chapter = Chapter::with('book')->where('slug_chapter',$slug)->where('book_id',$book->book_id)->first();

        // Lấy ra số chapter
        $chapter_number = Chapter::with('book')->orderBy('id', 'desc')->where('book_id',$book->book_id)->get();



        return view('pages.chapter')->with(compact('category','chapter','chapter_number','book','genre'))
                                    ->with('chapter_next', Chapter::find($chapter_next))
                                    ->with('chapter_previous', Chapter::find($chapter_previous));

    }
}
