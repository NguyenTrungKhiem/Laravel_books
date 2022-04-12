@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Liệt kê thể loại sách</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            {{-- <th scope="col">Slug</th> --}}
                            <th scope="col">Mô tả</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($genre as $key => $item)
                            <tr class="lh-lg ">
                                <th scope="row">{{ $key }}</th>
                                <td >{{ $item->namegenre}}</td>
                                {{-- <td >{{ $item->slug_genre}}</td> --}}
                                <td>{{ $item->descgenre}}</td>
                                <td>
                                    @if ($item->activate==0)
                                        <span class="text text-success">Kích hoạt </span>
                                    @else
                                        <span class="text text-danger">Không kích hoạt </span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('genre.edit',$item->id) }}" class="btn btn-primary btn-sm me-1">Edit</a>
                                    <form  action="{{ route('genre.destroy',$item->id) }}" method="post">
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

