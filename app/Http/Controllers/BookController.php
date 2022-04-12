<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Books::with('category','genre')->orderBy('id','desc')->get();

        return view('admincp.books.index')->with(compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'desc')->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        return view('admincp.books.create')->with(compact('category','genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'namebook' => 'required|unique:books|max:255',
                'author' => 'required|max:255',
                'slug_book' => 'required|unique:books|max:255',
                'img_book' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2024|dimensions:min_width=100,min_height=500,max_width=1000,max_height=2000',
                'descbook' => 'required',
                'activate_book' => 'required',
                'category_id' => 'required',
                'genre_id' => 'required',
            ],
            [
                //Thông báo lỗi
                'namebook.unique' => 'Tên sách đã tồn tại, vui lòng chọn tên khác',
                'namebook.required' => 'Chưa nhập tên sách',
                'author.required' => 'Chưa nhập tên tác giả',
                'slug_book.unique' => 'Slug đã tồn tại, vui lòng chọn tên khác',
                'slug_book.required' => 'Slug chưa có',
                'img_book.required' => 'Chưa thêm ảnh sách',
                'descbook.required' => 'Chưa nhập mô tả sách',
            ]
        );
        $book = new Books();
        $book->namebook = $data['namebook'];
        $book->author = $data['author'];
        $book->slug_book = $data['slug_book'];
        $book->category_id = $data['category_id'];
        $book->category_id = $data['genre_id'];
        $book->descbook = $data['descbook'];
        $book->activate_book = $data['activate_book'];

        $get_image = $request->img_book;
        $path = 'public/uploads/images';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $book->img_book = $new_image;

        $book->save();
        return redirect()->back()->with('status','Thêm sách thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Books::find($id);
        $category = Category::orderBy('id', 'desc')->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        return view('admincp.books.edit')->with(compact('book','genre','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'namebook' => 'required|max:255',
                'author' => 'required|max:255',
                'slug_book' => 'required|max:255',
                'img_book' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2024|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'descbook' => 'required',
                'activate_book' => 'required',
                'category_id' => 'required',
                'genre_id' => 'required',
            ],
            [
                //Thông báo lỗi
                'namebook.required' => 'Chưa nhập tên sách',
                'author.required' => 'Chưa nhập tên tác giả',
                'slug_book.required' => 'Slug chưa có',
                'descbook.required' => 'Chưa nhập mô tả sách',
            ]
        );
        $book = Books::find($id);
        $book->namebook = $data['namebook'];
        $book->author = $data['author'];
        $book->slug_book = $data['slug_book'];
        $book->category_id = $data['category_id'];
        $book->genre_id = $data['genre_id'];
        $book->descbook = $data['descbook'];
        $book->activate_book = $data['activate_book'];

        $get_image = $request->img_book;
        if($get_image)
        {
            $path = 'public/uploads/images/'. $book->img_book;
            if(file_exists($path)) {
                unlink($path);
             }
            $path = 'public/uploads/images/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);

            $book->img_book = $new_image;
        }

        $book->save();
        return redirect()->back()->with('status','Cập nhật sách thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Xóa hình ảnh trong file
        $book = Books::find($id);
        $path = 'public/uploads/images/'. $book->img_book;
        if(file_exists($path)) {
            unlink($path);
        }
        Books::find($id)->delete();
        return redirect()->back()->with('status','Xóa sách thành công');
    }
}
