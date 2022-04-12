@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-header">Liệt kê sách</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Tên tác giả</th>
                        <th scope="col">Hình ảnh</th>
                        {{-- <th scope="col">Slug</th> --}}
                        <th scope="col">Tóm tắt</th>
                        <th scope="col">Danh mục sách</th>
                        <th scope="col">Thể loại sách</th>
                        <th scope="col">Kích hoạt</th>
                        <th scope="col">Quản lý</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($book as $key => $item)
                        <tr class="lh-lg ">
                            <th scope="row">{{ $key }}</th>
                            <td >{{ $item->namebook}}</td>
                            <td >{{ $item->author }}</td>
                            <td ><img src="{{ asset('public/uploads/images/'.$item->img_book) }}" height="200" width="200"alt=""></td>
                            {{-- <td >{{ $item->slug_book}}</td> --}}
                            <td>{{ $item->descbook}}</td>
                            <td>{{ $item->category->namecategory}}</td>
                            <td>{{ $item->genre->namegenre}}</td>
                            <td>
                                @if ($item->activate_book==0)
                                    <span class="text text-success">Kích hoạt </span>
                                @else
                                    <span class="text text-danger">Không kích hoạt </span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('book.edit',$item->id) }}" class="btn btn-primary btn-sm me-1">Edit</a>
                                <form  action="{{ route('book.destroy',$item->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger delete btn-sm" data-id="{{ $item->id }}">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
       </div>
   </div>


</div>
@endsection
