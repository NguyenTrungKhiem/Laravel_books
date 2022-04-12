@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật thể loại sách</div>
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
                    <form action="{{ route('genre.update', $genre->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                          <input type="text" class="form-control" value="{{$genre->namegenre}}" id="slug" onkeyup="ChangeToSlug();" name="namegenre"
                          aria-describedby="emailHelp" placeholder="Tên thể loại">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" name="slug_genre" value="{{ $genre->slug_genre }}" id="convert_slug" aria-describedby="emailHelp" placeholder="Tên thể loại">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Mô tả thể loại</label>
                          <input type="text" class="form-control"  value="{{$genre->descgenre}}" name="descgenre"
                           aria-describedby="emailHelp" placeholder="Mô tả tên thể loại">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt thể loại</label>
                            <select class="form-select" name="activate">

                                @if($genre->activate==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="updategenre" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
