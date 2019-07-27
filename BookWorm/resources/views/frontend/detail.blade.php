@extends('frontend.master')
@section('main')
    <div class="details" >
        <div class="container" >
            <div class="book-link clearfix">
                <ul>
                    @foreach($bookLink as $bl)
                    <li><a href={{URL::asset('/')}}>{{$bl}}</a></li>
                    <li><i class="fas fa-angle-double-right"></i></li>
                    @endforeach
                </ul>
            </div>

            <section class="book-main">
                <div class="row">
                    @foreach($book as $bk)
                    <div class="col-12 col-lg-9 book-details">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-4 box-1">
                                <div class="image-book">
                                    <img &lt; src={{URL::asset('storage/image/'.$bk->image)}} class="imgBorder" width="200" height="200" /&gt; alt="Image not found">
                                </div>
                                <a @if($pageType==1)
                                   class="btn-type active-type"
                                   @endif
                                    href={{URL::asset('getDetail/'.$bk->id.'/'.'1')}}>Ebook</a>
                                <a  @if($pageType==2)
                                    class="btn-type active-type"
                                    @endif href={{URL::asset('getDetail/'.$bk->id.'/'.'2')}}> Paperbook</a>
                            </div>
                            <div class="col-lg-8 col-sm-6 col-8  box-2">
                                <div class="infor-book">
                                    <h5>Kẻ trộm sách</h5>
                                    <p><span>Rate</span>:
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </p>
                                    <p class="properties-book"><span>Tác giả</span> : {{$bk->author}}</p>
                                    <p class="properties-book"><span>Language</span> : {{$bk->language}}</p>
                                    <p class="properties-book"><span>Số trang</span> : {{$bk->pageNumber}}</p>
                                    <p class="properties-book"><span>Ngày phát hành</span> : {{$bk->publicDate}}    </p>


                                </div>

                               @yield('detail')
                                <!-- <div class="addCart-book">

                                        <p><span>Kich thuoc</span> :20*15 cm</p>
                                        <p><span>Trong luong</span>:250 gr</p>

                                        <p><span>gia</span>:25000vnd</p>
                                        <p class="btn-add-cart"><a href="#">Chọn mua <i class="fas fa-plus"></i></a> </p>
                                </div> -->
                            </div>
                            <div class="box-3 col-lg-12 col-12">
                                <div class="description">
                                    <h5>
                                        Bạn Đắt Giá Bao Nhiêu?
                                    </h5>
                                    <div class="ck-description">
                                        {!!$bk->description!!}
                                    </div>

                                    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                    <!-- (3): Code Javascript thay thế textarea có id='editor1' bởi CKEditor -->
                                    {{--<script>--}}

                                        {{--CKEDITOR.replace( 'editor1' );--}}

                                    {{--</script>--}}

                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-3 col-6 promotion">

                        <img src={{URL::asset("frontend/image/image/Celebrating-Black-History-Pinterest.png")}} alt="">

                    </div>
                </div>
            </section>


            <div class="book-related">
                <div class="book-related-title">
                    <h5>Sach moi nhat</h5>
                </div>
                <div class="book-slide">
                    <div class="slide-container clearfix">
                        @foreach($sameCategory as $sc)
                        <div class="book-item">
                            <a href="{{URL::asset('getDetail/'.$sc->id.'/1')}}">
                                <img src={{URL::asset("storage/image/".$sc->image)}} alt="">
                            </a>

                        </div>
                        @endforeach
                    </div>
                    <div class="btn-left"><i class="fas fa-chevron-left"></i></div>
                    <div class="btn-right"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
@stop