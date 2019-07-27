<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
            name='viewport'
            content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href={{URL::asset("frontend/css/css2\bootstrap-4.2.1-dist\css\bootstrap.min.css")}}>
    <script type="text/javascript" src={{URL::asset("frontend/js/jquery-3.3.1.min.js")}}></script>
    <link rel="stylesheet" href={{URL::asset("frontend/css/css2/fontawesome-free-5.6.3-web/css/all.min.css")}}>

    <link rel="stylesheet" href={{URL::asset("frontend/css/css2/fix.css")}}>
    <link rel="stylesheet" href={{URL::asset("frontend/css/css2/style.css")}}>
    <link rel="stylesheet" href={{URL::asset("frontend/css/css2/queries.css")}}>
    <!-- Include stylesheet -->
    <link href={{URL::asset("frontend/css/css2/algolia.css")}} rel="stylesheet" />
    <script  src="{{URL::asset('frontend/css/css2/bootstrap-4.2.1-dist\js\bootstrap.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{URL::asset('frontend/js/algolia.js')}}"></script>
    <script>
        $('window').ready(function(){
            $('#myCarousel').on('slid.bs.carousel', function (e) {
                $('#myCarousel').carousel('2') // Will slide to the slide 2 as soon as the transition to slide 1 is finished
            })

            $('#myCarousel').carousel('1') // Will start sliding to the slide 1 and returns to the caller
            $('#myCarousel').carousel('2') // !! Will be ignored, as the transition to the slide 1 is not finished !!
        });
    </script>

    <title>Document</title>

</head>
<body>
<div class="popup-login">
    <form method="post" action={{route('postLoginFrontend')}}>
        {{ csrf_field() }}
        <div class="login-manually">
            <h5>Login</h5>
            <div style="display: none" class="alert alert-danger"></div>
            <div  class="login user-name"><i class="fas fa-user"></i><input id="username" name="username" placeholder="user name" type="text"></div><br>
            <div class="login pass-word"><i class="fas fa-key"></i><input id="password" name="password"  placeholder="*******"  type="text"></div>
            <div class="login remember"><input type="checkbox" name="vehicle1" value="Bike"> Remember <a href="#">forgot password</a></div>
            <div class="login btn-login"><button class="btn btn-success">Login</button>
                <button class="buttonload">
                    <i class="fa fa-spinner fa-spin"></i>Login
                </button>
            </div>

        </div>
        <div class="login-social">
            <h6 class="line">Login</h6>
            <p class="line"> With your social media account</p>
            <div  class="line btn-social">
                <button class="btn-facebook"><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></button>
            </div>

        </div>
        <div class="register">
            <p class="question">Don't have an account?<a href="#">Register Now!</a></p>

        </div>
        <div class="login-close">
            <a class="btn-close" href="#"><i class="far fa-times-circle"></i></a>
        </div>
    </form>
</div>

<div id="backgrounddiv"></div>
<header>
    <nav>
        <div class="container header">
            <div class="row">
                <a href={{URL::asset('/')}}><img src={{URL::asset("frontend/image/logo-1.jpg")}}
                            class="logo"></a>
                <div class="clearfix search">
                    <form method="get" action="{{route('getSearch')}}">


                        <div class="search-fill">
                            <div class="search-left">
                                <select>
                                    <option value="author">Book</option>
                                    <option value="author">Author</option>
                                    <option value="author">Category</option>
                                </select>
                            </div>
                            {{--<input type="search" id="site-search" name="search" aria-label="Search through site content">--}}
                            <div class="form-group">
                                <input type="text" name="search" autocomplete="off" id="search" class="form-control input-lg" />
                                <div id="countryList">
                                    @include('frontend.searchItem')
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <button class="search-button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <script>
                            $(document).ready(function(){

                                $('#search').keyup(function(){
                                    var query = $(this).val();
                                    if(query != '')
                                    {
                                        var _token = $('input[name="_token"]').val();
                                        $.ajax({
                                            url:"{{ route('autocomplete.fetch') }}",
                                            method:"POST",
                                            data:{query:query, _token:_token},
                                            success:function(data){
                                                $('#countryList').css('display','block');
                                                $('#countryList').html(data);
                                            }
                                        });
                                    }
                                });


                            });
                        </script>

                    </form>

                </div>
                <ul class="menu-nav js--menu-nav">
                    <li><a href="#library"><i class="fas fa-book-reader"></i>Thư viện</a></li>
                    <li><a href="#blog"><i class="far fa-newspaper"></i>Tin tức</a></li>
                    <li>

                        <a href={{URL::asset('getCart')}}><i class="fas fa-cart-plus"></i>Giỏ hàng

                            @if(Session::has('itemNumber'))
                                <span class="itemNumber">
                                {{ Session::get('itemNumber')}}
                                </span>
                            @endif

                        </a>
                    </li>
                    <li class="account">
                        @if((session()->has('userId')))
                            {{--<a class="btn-signin" href="#"><i class="fas fa-user-tie"></i>Do Minh Ngoc</a>--}}
                            <div class="user">

                                <a class="btn-user" href="#">{{session('userName')}}</a>

                                <ul>
                                    <li><a href={{URL::asset('getAccountManager')}}> Accout Manager</a></li>
                                    <li><a href={{URL::asset('getLogoutFrontend')}}> Log Out</a></li>
                                </ul>

                            </div>
                        @else

                            <a class="btn-signin" href="#"><i class="fas fa-user-tie"></i>Sign In</a>
                        @endif


                    </li>



                </ul>

            </div>
        </div>
    </nav>
</header>
@yield('main')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h6 class="about-us"><img src="" alt="">
                    <a href={{URL::asset('/')}}><img src={{URL::asset("frontend/image/logo-1.jpg")}}
                                class="logo"></a>
                    <p>Book worm company</p>

                </h6>
                <p>
                    Là công ti được thành lập
                    cuối năm 2018 với sứ mệnh là mang trí thức
                    đến hàng triệu người dân việt nam thông qua những
                    cốn sách
                </p>
            </div>
            <div class="col-12 col-sm-3">
                <h6>Thông tin thêm</h6>
                <p><a href="">Tin tức</a></p>
                <p><a href="">Nguồn tham khảo</a></p>
                <p><a href="">anime</a></p>
                <p><a href="">góc bạn đọc</a></p>
                <p><a href="">hạnh phúc là gì</a></p>
            </div>
            <div class="col-12 col-sm-3">
                <h6>Liện hệ với tôi</h6>
                <div><a href="#"> <i class="fab fa-facebook-square"></i>facebook/ngocdo123</a></div>
                <div><a href="#"><i class="fab fa-facebook-messenger"></i>message/ngocdo123 </a></div>
                <div><a href="#"><i class="fab fa-youtube"></i> </a>youtube/ngocdo123</div>
            </div>

        </div>
        <p class="copyright">© 2015 - Bản quyền thuộc về Công ty TNHH Book Worm</p>
    </div>
</footer>
<script src="{{URL::asset('frontend/js/script.js')}}"></script>
</body>

</html>