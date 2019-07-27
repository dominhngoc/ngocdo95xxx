{{--<div class="main-paginate">{{ $book->links() }}--}}
{{--</div>--}}
<div class="row table_data">
@foreach($book as $b)

    <div class="col-sm-12 col-lg-3 col-md-6">
        <div class="item Shadow clearfix">
            <img  src={{URL::asset('storage/image/'.$b->image)}} alt="image"">
            {{--<img class="lazy" src={{URL::asset('https://res.cloudinary.com/dj5ke0pab/image/upload/v1546180959/samples/image/'.$b->image)}} alt="image">--}}
            {{--<img src="https://res.cloudinary.com/dj5ke0pab/image/upload/v1546180959/samples/image/51U6bQbA8oL._SY346_.jpg" alt="">--}}
            <p><a href="{{URL::asset('getDetail/'.$b->id.'/1')}}">{{$b->name}}</a></p>
            <p class="author">{{$b->author}}</p>
            <p class="price">1244221$</p>
            <p class="price salePrice"></p>
            <!-- <p>1500000DD</p> -->
            <div class="rate"> <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <span class="rate-point">(22520)</span>
            </div>
            <a href="#"><div class="download"><i class="fas fa-arrow-down"></i></div></a>
            <div class="rem"></div>
            <div class="detail">
                <a href="#"><i class="fas fa-book-open"></i></a>
            </div>
        </div>
    </div>
@endforeach
</div>
<div class="main-paginate">{{ $book->links() }}</div>