@extends('frontend.master')
@section('main')
<section class="main main-search">
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
                <p>Key:
                    <span id="keyWord">
                            {{$keyWord}}
                    </span></p>
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
@stop