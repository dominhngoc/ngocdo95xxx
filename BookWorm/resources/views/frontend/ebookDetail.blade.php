@extends('frontend.detail')
@section('detail')
<div class="download-book">
    <p class="btn-download"><a href="#">Tải xuống <i class="far fa-arrow-alt-circle-down"></i></a> </p>
    <p class="type-download">
        <span>Định dang</span>:
        @foreach($downloadLink as $dl)
            <a href={{URL::asset("download/".$dl->link)}}>{{$dl->typeName}}</a>
    @endforeach
</div>
@stop