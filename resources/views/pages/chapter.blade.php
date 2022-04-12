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
    .btn-disable {
        pointer-events: none;
        cursor: default;
    }
</style>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
      <li class="breadcrumb-item active" aria-current="page">Danh sách truyện</li>
      <li class="breadcrumb-item active" aria-current="page">{{ $chapter->book->namebook }}</li>
      <li class="breadcrumb-item active" aria-current="page">Chapter {{ $chapter->number_chapter }}</li>
    </ol>
</nav>
    <div class="row ">
        <div class="col-md-12">
            <h4>{{ $chapter->book->namebook }} - <span>Chapter {{ $chapter->number_chapter }}</span></h4>
                <div class="form-group d-flex justify-content-center align-items-center">
                    @if ($chapter_previous)
                        <a class="btn-lg btn-danger" href="{{ url('chapter-user/'.$chapter_previous->slug_chapter) }}" role="button">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @else
                        <a class="btn-lg btn-secondary " style="cursor: default;" role="button">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    <select class="form-select-lg me-2 ms-2 select-chapter" name="active_book" aria-label="Default select example" style="width:100%; max-width: 300px">
                        @foreach ($chapter_number as $key => $item)
                            <option value="{{ url('chapter-user/'.$item->slug_chapter) }}">Chapter {{ $item->number_chapter }}</option>
                        @endforeach
                    </select>
                    @if ($chapter_next)
                        <a class="btn-lg btn-danger" href="{{ url('chapter-user/'.$chapter_next->slug_chapter) }}" role="button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                     @else
                        <a class="btn-lg btn-secondary " style="cursor: default;" role="button">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @endif

                </div>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="content-chapter mt-3">
                <p>
                    {!! $chapter->contentchapter !!}
                </p>
             </div>
        </div>
        <div class="col-md-12">
            <div class="form-group d-flex justify-content-center align-items-center">
                @if ($chapter_previous)
                    <a class="btn-lg btn-danger" href="{{ url('chapter-user/'.$chapter_previous->slug_chapter) }}" role="button">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @else
                    <a class="btn-lg btn-secondary btn-disable"  role="button">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                <select class="form-select-lg me-2 ms-2 select-chapter" name="active_book" aria-label="Default select example" style="width:100%; max-width: 300px">
                    @foreach ($chapter_number as $key => $item)
                        <option value="{{ url('chapter-user/'.$item->slug_chapter) }}">Chapter {{ $item->number_chapter }}</option>
                    @endforeach
                </select>
                @if ($chapter_next)
                    <a class="btn-lg btn-danger" href="{{ url('chapter-user/'.$chapter_next->slug_chapter) }}" role="button">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                 @else
                    <a class="btn-lg btn-secondary btn-disable"  role="button">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @endif

            </div>
        </div>

    </div>

@endsection

