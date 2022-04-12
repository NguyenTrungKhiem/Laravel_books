@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật sách</div>
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
                    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                          <input type="text" class="form-control" name="namebook" value="{{ $book->namebook }}"
                          id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="Tên sách">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên tác giả</label>
                            <input type="text" class="form-control" name="author" value="{{ $book->author }}"
                             aria-describedby="emailHelp" placeholder="Tên tác giả">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug sách</label>
                            <input type="text" class="form-control" name="slug_book" value="{{ $book->slug_book }}"
                            id="convert_slug" aria-describedby="emailHelp" placeholder="Tên sách">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tóm tắt sách</label>
                          <textarea class="form-control" id="edit_content" name="descbook" rows="5" style="resize: none">{{ $book->descbook }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh mục sách</label>
                            <select class="form-select" name="category_id" aria-label="Default select example">
                                @foreach ($category as $key => $item)
                                  <option {{ $item->id==$book->category_id ? ' selected' : '' }}  value="{{ $item->id }}">{{ $item->namecategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thể loại sách</label>
                            <select class="form-select" name="genre_id" aria-label="Default select example">
                                @foreach ($genre as $key => $item)
                                  <option {{ $item->id==$book->genre_id ? ' selected' : '' }}  value="{{ $item->id }}">{{ $item->namegenre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh sách</label>
                            <input type="file" class="form-control" name="img_book">
                            <img src="{{ asset('public/uploads/images/'.$book->img_book) }}" height="200" width="200"alt="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt sách</label>
                            <select class="form-select" name="activate_book" aria-label="Default select example">
                                @if($book->activate_book==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
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
