<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = Genre::orderBy('id','desc')->get();
        return view('admincp.genre.index')->with(compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.genre.create');
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
                'namegenre' => 'required|unique:genre|max:255',
                'slug_genre' => 'required|unique:genre|max:255',
                'descgenre' => 'required|max:255',
                'activate_genre' => 'required',
            ],
            [
                //Thông báo lỗi
                'namegenre.unique' => 'Tên thể loại đã tồn tại, vui lòng chọn tên khác',
                'slug_genre.unique' => 'Slug đã tồn tại, vui lòng chọn tên khác',
                'namegenre.required' => 'Chưa nhập tên thể loại',
                'descgenre.required' => 'Chưa nhập mô tả thể loại',
            ]
        );
        $genre = new Genre();
        $genre->namegenre = $data['namegenre'];
        $genre->slug_genre = $data['slug_genre'];
        $genre->descgenre = $data['descgenre'];
        $genre->activate_genre = $data['activate_genre'];
        $genre->save();
        return redirect()->back()->with('status','Thêm thể loại thành công');
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
        $genre = Genre::find($id);
        return view('admincp.genre.edit')->with(compact('genre'));
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
                'namegenre' => 'required|max:255',
                'slug_genre' => 'required|max:255',
                'descgenre' => 'required|max:255',
                'activate' => 'required',
            ],
            [
                'namegenre.required' => 'Chưa nhập tên thể loại',
                'descgenre.required' => 'Chưa nhập mô tả tên thể loại',
            ]
        );
        $genre = Genre::find($id);
        $genre->namegenre = $data['namegenre'];
        $genre->slug_genre = $data['slug_genre'];
        $genre->descgenre = $data['descgenre'];
        $genre->activate_genre = $data['activate_genre'];
        $genre->save();
        return redirect()->back()->with('status','Cập nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::find($id)->delete();
        return redirect()->back()->with('status','Xóa thể loại thành công');
    }
}
