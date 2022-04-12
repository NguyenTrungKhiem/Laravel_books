@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm sách</div>
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
                    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                          <input type="text" class="form-control" name="namebook" value="{{ old('namebook') }}"
                          id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="Tên sách">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên tác giả</label>
                            <input type="text" class="form-control" name="author" value="{{ old('author') }}"
                             aria-describedby="emailHelp" placeholder="Tên tác giả">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug sách</label>
                            <input type="text" class="form-control" name="slug_book" value="{{ old('slug_book') }}"
                            id="convert_slug" aria-describedby="emailHelp" placeholder="Tên sách">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tóm tắt sách</label>
                          <textarea class="form-control" id="edit_content" name="descbook" value="{{ old('descbook') }}" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh mục sách</label>
                            <select class="form-select" name="category_id" aria-label="Default select example">
                                @foreach ($category as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->namecategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thể loại sách</label>
                            <select class="form-select" name="genre_id" aria-label="Default select example">
                                @foreach ($genre as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->namegenre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh sách</label>
                            <input type="file" class="form-control" name="img_book">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt sách</label>
                            <select class="form-select" name="activate_book" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="addbook" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
