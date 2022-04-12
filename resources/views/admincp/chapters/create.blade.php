@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chapter sách</div>
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
                    <form action="{{ route('chapter.store') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số chapter</label>
                            <input type="text" class="form-control" name="number_chapter" value="{{ old('number_chapter') }}"
                             aria-describedby="emailHelp" placeholder="Số chapter">
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên chapter</label>
                          <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                          id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="Tên chapter">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug chapter</label>
                            <input type="text" class="form-control" name="slug_chapter" value="{{ old('slug_chapter') }}"
                            id="convert_slug" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tóm tắt chapter</label>
                          <textarea class="form-control" name="descchapter" value="{{ old('descchapter') }}" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội dung chapter</label>
                            <textarea class="form-control" id="edit_content" name="contentchapter" value="{{ old('contentchapter') }}" rows="5" style="resize: none"></textarea>
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thuộc sách</label>
                            <select class="form-select" name="book_id" aria-label="Default select example">
                                @foreach ($book as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->namebook }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt chapter</label>
                            <select class="form-select" name="activate_chapter" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="addchapter" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
