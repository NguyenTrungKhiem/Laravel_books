@extends('../layout')

@section('content')
<style>
    .list-chapter, .breadcrumb li a{
        color:black;
    }
    .list-chapter:hover,
    .breadcrumb li a:hover{
        color:red;
    }
</style>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Danh sách truyện</li>
      <li class="breadcrumb-item active" aria-current="page">{{ $book->namebook }}</li>
    </ol>
</nav>
  <div class="row">
      <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <img class="bd-placeholder-img card-img-top "  src="{{ asset('public/uploads/images/'.$book->img_book) }}" alt="">
            </div>
            <div class="col-md-8">
                <ul class="infobook list-unstyled">
                    <li class="mt-2">Tác sách : {{ $book->namebook}} </li>
                    <li class="mt-2">Tác giả : {{ $book->author }} </li>
                    <li class="mt-2">Thể loại : Hài hước, học đường </li>
                    <li class="mt-2">Số chapter : 200 </li>
                    <li class="mt-2">Số lượt xem : 20000 </li>
                    @if ($chapter_first)
                        <li class="mt-2"><a href="{{ url('chapter-user/'.$chapter_first->slug_chapter) }}" class="btn btn-danger text-decoration-none">Đọc từ đầu</a></li>
                        <li class="mt-2"><a href="#" class="btn btn-danger text-decoration-none">Đọc chapter mới nhất</a></li>
                    @else
                    <li class="mt-2"><a href="" class="btn btn-danger text-decoration-none">Đang cập nhật</a></li>
                    @endif

                </ul>
            </div>
        </div>
        <div class="col-md-12 border-dark border-bottom border-1 mt-4">
            <h4 class="">Tóm tắt sách</h4>
            <p class="desc">
                {{ $book->descbook }}
            </p>
        </div>
        <div class="mt-3 border-dark border-bottom border-1">
            <h4 class="">Danh Sách Chapter</h4>
            @php
                $count = count($chapter);
            @endphp
            @if ($count > 0)
                @foreach ($chapter as $key => $item)
                <a class="d-flex justify-content-between align-items-center mt-3 mb-3 text-decoration-none list-chapter " href="{{ url('chapter-user/'.$item->slug_chapter) }}">
                    <span class=" fs-6">Chapter: {{ $item->number_chapter }}</span>
                    <span class="fs-6 ">{{ $item->title }}</span>
                    <span class="fs-6 "> 20/12/2022</span>
                </a>
                @endforeach
            @else
                <a class="d-flex justify-content-between align-items-center mt-3 mb-3 text-decoration-none list-chapter ">
                  Đang cập nhật....
                </a>
            @endif

        </div>
        <div class="list-category--typebook mt-3">
            <h4 class="">Sách cùng thể loại</h4>
            <div class="row">
                @foreach ($category_same as $key => $item)
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <a  href="{{ url('books/'.$item->slug_book) }}">
                                <img class="bd-placeholder-img card-img-top "  src="{{ asset('public/uploads/images/'.$item->img_book) }}" alt="">
                            </a>
                            <div class="card-body">
                                <h6 class="card-title">{{ $item->namebook }}</h6>
                                {{-- @foreach ($chapter as $key => $item)
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="btn-group">
                                            <a href="{{ url('chapter-user/'.$item->slug_chapter) }}" class="text-decoration-none text-dark" >Chapter: {{ $item->number_chapter }}</a>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <h3 class="lh-base">Bảng xếp hạng truyện</h3>
      </div>
  </div>
@endsection

