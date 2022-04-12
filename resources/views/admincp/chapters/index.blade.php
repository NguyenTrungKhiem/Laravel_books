@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">Liệt kê chapter</div>
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
                            <th scope="col">Tiêu đề chapter</th>
                            <th scope="col">Sô tập</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Thuộc truyện</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($chapter as $key => $item)
                            <tr class="lh-lg ">
                                <th scope="row">{{ $key }}</th>
                                <td >{{ $item->title }}</td>
                                <td >{{ $item->number_chapter}}</td>
                                <td>{{ $item->descchapter}}</td>
                                <td>{{ $item->book->namebook }}</td>
                                <td>
                                    @if ($item->activate_chapter==0)
                                        <span class="text text-success">Kích hoạt </span>
                                    @else
                                        <span class="text text-danger">Không kích hoạt </span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('chapter.edit',$item->id) }}" class="btn btn-primary btn-sm me-1">Edit</a>
                                    <form  action="{{ route('chapter.destroy', $item->id) }}" method="post">
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

