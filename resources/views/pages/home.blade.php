@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
 @section('content')
 {{-- PRODUCT NEW --}}
    <div class="album py-5 bg-light">
        <h3 class="mb-3">SÁCH MỚI CẬP NHẬT</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            @foreach ($book as $key => $item)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ url('books/'.$item->slug_book) }}">
                            <img class="bd-placeholder-img card-img-top "  src="{{ asset('public/uploads/images/'.$item->img_book) }}" alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->namebook }}</h5>
                            {{-- @foreach ($chapter_number as $key => $item)
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
        <a href="#" class="btn btn-success mt-3 float-end">Xem tất cả</a>
    </div>
    {{-- PRODUCT MOST VIEW --}}
    <div class="album py-5 bg-light">
        <h3 class="mb-3">SÁCH NHIỀU NGƯỜI ĐỌC</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <div class="col">
                <div class="card shadow-sm">
                <a href="">
                    <img class="bd-placeholder-img card-img-top " src="{{ asset('public/uploads/images/sach_thieu_nhi595.jpg') }}" alt="">
                </a>
                {{-- <div class="card-body">
                    <h5 class="card-title">Sách thiếu nhi</h5>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 10</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 9</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 8</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                </div> --}}
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                <a href="">
                    <img class="bd-placeholder-img card-img-top " src="{{ asset('public/uploads/images/sach_thieu_nhi595.jpg') }}" alt="">
                </a>
                {{-- <div class="card-body">
                    <h5 class="card-title">Sách thiếu nhi</h5>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 10</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 9</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 8</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                </div> --}}
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                <a href="">
                    <img class="bd-placeholder-img card-img-top " src="{{ asset('public/uploads/images/sach_thieu_nhi595.jpg') }}" alt="">
                </a>
                {{-- <div class="card-body">
                    <h5 class="card-title">Sách thiếu nhi</h5>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 10</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 9</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 8</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                </div> --}}
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                <a href="">
                    <img class="bd-placeholder-img card-img-top " src="{{ asset('public/uploads/images/sach_thieu_nhi595.jpg') }}" alt="">
                </a>
                {{-- <div class="card-body">
                    <h5 class="card-title">Sách thiếu nhi</h5>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 10</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 9</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="#" class="text-decoration-none text-dark" >Chapter 8</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-success mt-3 float-end">Xem tất cả</a>
    </div>
@endsection
