@extends('frontend.detail')
@section('detail')
    @foreach($book as $bk)
<div class="addCart-book">

    <p><span>Kich thuoc</span> {{$bk->size}}</p>
    <p><span>Trong luong</span>{{$bk->weight}}</p>

    <p><span>gia</span>:25000vnd</p>
    <p class="btn-add-cart"><a href={{URL::asset('getAddCart/'.$bk->id)}}>Chọn mua <i class="fas fa-plus"></i></a> </p>
</div>
    @endforeach
@stop