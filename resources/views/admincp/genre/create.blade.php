@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại sách</div>
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
                    <form action="{{ route('genre.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                          <input type="text" class="form-control" name="namegenre" value="{{ old('namegenre') }}"
                          id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="Tên thể loại">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" name="slug_genre" value="{{ old('slug_genre') }}"
                            id="convert_slug" aria-describedby="emailHelp" placeholder="Tên thể loại">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Mô tả thể loại</label>
                          <input type="text" class="form-control" name="descgenre" value="{{ old('descgenre') }}"
                           aria-describedby="emailHelp" placeholder="Mô tả tên thể loại">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt thể loại</label>
                            <select class="form-select" name="activate_genre" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="addgenre" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
