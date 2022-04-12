<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Books</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->

    </head>
    <body>
        <div id="app">
             <head class="header">
                <nav class="navbar container-fluid navbar-expand-lg navbar-dark bg-dark " >
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#"><img src="{{ asset('public/img/logo.png') }}" alt=""></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Trang Chủ</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Danh mục truyện
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($category as $key => $item)
                                    <li><a class="dropdown-item" href="{{ url('category-user/'.$item->slug_category) }}">{{ $item->namecategory }}</a></li>
                                @endforeach
                            </ul>

                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Thể loại truyện
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($genre as $key => $item)
                                <li><a class="dropdown-item" href="{{ url('genre-user/'.$item->slug_genre) }}">{{ $item->namegenre }}</a></li>
                                @endforeach
                            </ul>
                          </li>


                          {{-- <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                          </li> --}}
                        </ul>
                        <form class="d-flex">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                      </div>
                    </div>
                </nav>
            </head>

            <main class="container-xl mt-5">
                {{-- SLIDE --}}
                @yield('slide')

                @yield('content')
                {{-- PRODUCT NEW --}}

                {{-- PRODUCT MOST VIEW --}}

        </main>
        <footer class="container-fluid bg-dark mt-5 " style="height: 150px; max-height: 100%;">
           <div class="container-xxl pt-4">
                <img class="img-responsive " src="{{ asset('public/img/logo.png') }}" alt="">
                <p class="text-light text-center mt-4">Copyright © 2019 Heling</p>
           </div>
        </footer>
    </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                // nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
        </script>
        <script>
            $('.select-chapter').on('change', function() {
                var url = $(this).val();
                if(url){
                    window.location = url;
                }
                return false;
            });

            current_chapter();
            function current_chapter(){
                var url = window.location;
                $('.select-chapter').find('option[value="' + url + '"]').attr('selected',true);
            }
        </script>

</body>
</html>
