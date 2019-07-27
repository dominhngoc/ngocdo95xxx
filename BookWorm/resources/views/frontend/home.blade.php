@extends('frontend.master')
@section('main')
<div class="home">
    <section class="Quote">
        <div class="container">
            <div class="quote--container">
                <p class="quote">
                    There is no exquisite beauty&hellip;
                    without some <span class="quote--highlight">strangeness</span> in the proportion.
                </p>
                <p class="quote--author">&ndash; Francis Bacon</p>
            </div>
        </div>
        <audio id="myAudio" src="http://www.sousound.com/music/healing/healing_01.mp3" preload="auto">
        </audio>
        <div class="group-btn">
            <a><i class="fas fa-forward"></i></a>
            <a onClick="togglePlay()" ><i class="fas fa-music"></i></a>
            <a class="btn-back-top" ><i class="fas fa-arrow-up"></i></a>
        </div>
    </section>
    <section class="Banner">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class=" carousel-inner">
                    <div class="banner carousel-item active">
                        <img class="d-block w-100" src={{URL::asset('storage\banner\2018TYIB_KBHP_1500x300_V1c.jpg')}} alt="First slide">
                    </div>
                    <div class="banner carousel-item">
                        <img class="d-block w-100" src={{URL::asset('storage\banner\1144_newc.jpg')}} alt="Second slide">
                    </div>
                    <div class="banner carousel-item">
                        <img class="d-block w-100"src={{URL::asset('storage\banner\1120_newc.jpg')}}  alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="container">

            <div class="category">
                <p class="title">Danh mục sách</p>
                <ul class="list-book">
                    @foreach($dcategory as $dctg)
                        <li class="subMenu" id='subMenu-{{$dctg->id}}'><a href="#">{!! $dctg->logo !!}{{$dctg->name}}  </a>
                            <ul>
                                @foreach($dctg->category as $sub)
                                    <li><a href="#">{{$sub->name}} ({{$sub->bookNumber}})</a></li>
                                @endforeach

                            </ul>
                        </li>
                    @endforeach

                </ul>


            </div>
            <div class="main-center">
                <div class="main-header clearfix">
                    <h5>Bán chạy nhất</h5>
                    <ul>
                        <li><a href="#">Sale</a></li>
                        <li class="actived"><a href="#">Giá</a></li>
                        <li><a href="#">Mới nhất</a></li>
                        <li><a href="#">Hot</a></li>

                    </ul>

                </div>

                {{--<ul >--}}
                {{--<li><i class="fas fa-chevron-right"></i></li>--}}
                {{--<li><a href="#">...</a></li>--}}
                {{--<li><a href="#">3</a></li>--}}
                {{--<li><a href="#">2</a></li>--}}
                {{--<li><a href="#">1</a></li>--}}
                {{--<li><i class="fas fa-chevron-left"></i></li>--}}
                {{--</ul>--}}

                {{--{{ $book->links() }}--}}


                <div class="main-body">



                    @include('frontend.item')




                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){

                $(document).on('click', '.pagination a', function(event){
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    // $('.item img').fadeOut(10000,fetch_data(page));
                    fetch_data(page);

                });

                function fetch_data(page)
                {
                    $.ajax({
                        type:'get',
                        url:"/ajax/books?page="+page,
                        dataType: 'text',
                        success:function(data)
                        {

                            //user_jobs div defined on page
                            // $('.main-body').html(data);

                            $(".main-body").html(data);
                            $('.item img').hide();
                            $('.item img').fadeIn(1000);

                        }
                    });

                }

            });
        </script>

        <script src={{ URL::asset('lte\bower_components\jquery\dist/jquery.min.js') }}></script>
    </section>
    <section class="creative">
        <div class="container">
            <div class="row creative-header">
                <div class="col-lg-2  col-12 col-sm-12">
                    <div class="wordart slate"><span class="text">Mới phát hành</span></div>
                </div>
                <div class="col-lg-10 col-12 col-sm-12">
                    @foreach($newBook as $b)
                    <div id="creative{{$b->id}}" class="creative-quote">



                            <span style="">&#8220;</span>{!! $b->description !!}

                        <p class="quote--author">&ndash; {{$b->author}}</p>

                    </div>
                    @endforeach
                </div>
            </div>

            <div class="creative-main">

                <div class="swipe-slide clearfix">

                    @foreach($newBook as $b)
                        <div class="item-slide item-slide{{$b->id}}">
                            <div class="item-center">
                                <a href="{{URL::asset('getDetail/'.$b->id.'/1')}}">
                                    <img id="image{{$b->id}}"  src={{URL::asset('storage/image/'.$b->image)}} alt="image"">

                                </a>
                                <div class="black-rem"></div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <i class="fas fa-chevron-left left"></i>
                <i class="fas fa-chevron-right right"></i>
            </div>
        </div>
        <script>
            $('document').ready(function () {
                $('#creative1').css('display','block');
                $('.item-slide img').mouseenter(function () {
                      console.log('1 hover');
                      $('.creative-quote').css('display','none');
                      $id=($(this).attr('id')).slice(5,6);
                      $('#creative'+$id).css('display','block');
                })
            });
        </script>




    </section>


    <section class="section-form">
        <div class="container">
            <div class="row">
                <h3>Chúng tôi rất vui khi được lắng nghe bạn !</h3>
            </div>
            <div class="row">
                <form method="post" action="#" class="contact-form">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="name">Tên</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="name" id="name" placeholder="Your name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="email">Email</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="email" id="email" placeholder="Your email" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Đánh giá</label>
                        </div>
                        <div class="col span-2-of-3">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Góp ý</label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="message" placeholder="Your message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Send it!">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
@stop