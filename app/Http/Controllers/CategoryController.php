<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id','desc')->get();
        return view('admincp.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.category.create');
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
                'namecategory' => 'required|unique:categories|max:255',
                'slug_category' => 'required|unique:categories|max:255',
                'desccategory' => 'required|max:255',
                'activate' => 'required',
            ],
            [
                //Thông báo lỗi
                'namecategory.unique' => 'Tên danh mục đã tồn tại, vui lòng chọn tên khác',
                'slug_category.unique' => 'Slug đã tồn tại, vui lòng chọn tên khác',
                'namecategory.required' => 'Chưa nhập tên danh mục',
                'desccategory.required' => 'Chưa nhập mô tả danh mục',
            ]
        );
        $category = new Category();
        $category->namecategory = $data['namecategory'];
        $category->slug_category = $data['slug_category'];
        $category->desccategory = $data['desccategory'];
        $category->activate = $data['activate'];
        $category->save();
        return redirect()->back()->with('status','Thêm danh mục thành công');
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
        $category = Category::find($id);
        return view('admincp.category.edit')->with(compact('category'));
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
                'namecategory' => 'required|max:255',
                'slug_category' => 'required|max:255',
                'desccategory' => 'required|max:255',
                'activate' => 'required',
            ],
            [
                'namecategory.required' => 'Chưa nhập tên danh mục',
                'desccategory.required' => 'Chưa nhập mô tả tên danh mục',
            ]
        );
        $category = Category::find($id);
        $category->namecategory = $data['namecategory'];
        $category->slug_category = $data['slug_category'];
        $category->desccategory = $data['desccategory'];
        $category->activate = $data['activate'];
        $category->save();
        return redirect()->back()->with('status','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }
}
