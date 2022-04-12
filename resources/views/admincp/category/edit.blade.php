@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật danh mục sách</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                          <input type="text" class="form-control" value="{{$category->namecategory}}" id="slug" onkeyup="ChangeToSlug();" name="namecategory"
                          aria-describedby="emailHelp" placeholder="Tên danh mục">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug danh mục</label>
                            <input type="text" class="form-control" name="slug_category" value="{{ $category->slug_category }}" id="convert_slug" aria-describedby="emailHelp" placeholder="Tên danh mục">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Mô tả danh mục</label>
                          <input type="text" class="form-control" " value="{{$category->desccategory}}" name="desccategory"
                           aria-describedby="emailHelp" placeholder="Mô tả tên danh mục">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt danh mục</label>
                            <select class="form-select" name="activate">

                                @if($category->activate==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="updatecategory" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
