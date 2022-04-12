@extends('../layout')

 @section('content')
 {{-- PRODUCT NEW --}}
    <div class="album py-5 bg-light">
        <h3 class="mb-3">{{ $category_id->namecategory }}</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            @php
                $count = count($book);
            @endphp
            @if ($count == 0)
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="">Hiện tại không có sách nào....</h3>
                        </div>
                    </div>
                </div>
            @else

                @foreach ($book as $key => $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="{{ url('books/'.$item->slug_book) }}">
                                <img class="bd-placeholder-img card-img-top "  src="{{ asset('public/uploads/images/'.$item->img_book) }}" alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->namebook }}</h5>
                                {{-- @foreach ($chapter as $key => $item)
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="btn-group">
                                            <a href="#" class="text-decoration-none text-dark" >Chapter: {{ $item->number_chapter }}</a>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection
