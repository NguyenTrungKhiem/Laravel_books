<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::with('book')->orderBy('id','desc')->get();

        return view('admincp.chapters.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Books::orderBy('id', 'desc')->get();
        return view('admincp.chapters.create')->with(compact('book'));
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
                'title' => 'required|unique:chapter|max:255',
                'slug_chapter' => 'required|unique:chapter|max:255',

                'number_chapter' => 'required|max:255',
                'contentchapter' => 'required',
                'descchapter' => 'required',
                'activate_chapter' => 'required',
                'book_id' => 'required',
            ],
            [
                //Thông báo lỗi
                'title.unique' => 'Tiêu đề chapter đã tồn tại, vui lòng chọn tiêu đề khác',
                'title.required' => 'Chưa nhập tiêu đề chapter',
                'slug_chapter.unique' => 'Slug đã tồn tại, vui lòng chọn tiêu đề khác',
                'slug_chapter.required' => 'Slug chưa có',
                'contentchapter.required' => 'Chưa thêm nội dung chapter',
                'descchapter.required' => 'Chưa nhập mô tả chapter',
            ]
        );
        $chapter = new Chapter();
        $chapter->title = $data['title'];
        $chapter->number_chapter = $data['number_chapter'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->contentchapter = $data['contentchapter'];
        $chapter->book_id = $data['book_id'];
        $chapter->descchapter = $data['descchapter'];
        $chapter->activate_chapter = $data['activate_chapter'];

        $chapter->save();
        return redirect()->back()->with('status','Thêm chapter thành công');
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
        $chapter = chapter::find($id);
        $book = Books::orderBy('id', 'desc')->get();
        return view('admincp.chapters.edit')->with(compact('book','chapter'));
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
                'title' => 'required|max:255',
                'slug_chapter' => 'required|max:255',

                'number_chapter' => 'required',
                'contentchapter' => 'required',
                'descchapter' => 'required',
                'activate_chapter' => 'required',
                'book_id' => 'required',
            ],
            [
                //Thông báo lỗi
                'title.required' => 'Chưa nhập tiêu đề chapter',
                'slug_chapter.required' => 'Slug chưa có',
                'contentchapter.required' => 'Chưa thêm nội dung chapter',
                'descchapter.required' => 'Chưa nhập mô tả chapter',
            ]
        );
        $chapter = Chapter::find($id);
        $chapter->title = $data['title'];
        $chapter->number_chapter = $data['number_chapter'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->contentchapter = $data['contentchapter'];
        $chapter->book_id = $data['book_id'];
        $chapter->descchapter = $data['descchapter'];
        $chapter->activate_chapter = $data['activate_chapter'];

        $chapter->save();
        return redirect()->back()->with('status','Cập nhật chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status','Xóa sách thành công');
    }
}
