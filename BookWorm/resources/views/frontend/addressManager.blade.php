@extends('frontend.manager')
@section('box')
<div class="address-header">
    <h5>Quản lý địa chỉ</h5>
</div>
<div class="address-add">
    <div class="address-add-title">  <h6>Thêm địa chỉ mới  <i class="fas fa-plus"></i></h6></div>

    <form method="post" action="{{route('postAddAddressManager')}}">
        {{ csrf_field() }}
        <p class="input-name">Tên bạn</p>
        <input name="name" type="text" placeholder="type your name">
        <p class="input-name">Số điện thoại</p>
        <input name="address" type="text" placeholder="type your address">
        <p class="input-name">Địa chỉ nhận hàng</p>
        <input name="phoneNumber" type="text" placeholder="type your phone number">
        <p class="input-name">Tỉnh,thành phố</p>
        <input name="province" type="text" placeholder="type your province">
        <input type="submit" value="Ok">
    </form>
</div>
<div class="address-box">
    <div class="row">
        @foreach($address as $adr)
        <div class="col-lg-4 col-12">

            <div class="adress-item">
                <h5>{{$adr->name}}</h5>
                <p class="province">{{$adr->province}}</p>
                <p class="adress-detail">{{$adr->address}}</p>
                <p class="phone">Phone:{{$adr->phoneNumber}}</p>
                <div class="edit">
                    <a>Sửa <i class="far fa-edit"></i>

                    </a>
                    <form  method="post" action="{{route('postEditAddressManager')}}">
                        {{ csrf_field() }}
                        <p class="input-name">Tên bạn</p>
                        <input name="name" type="text" placeholder="{{$adr->name}}">
                        <p class="input-name">Số điện thoại</p>
                        <input name="phoneNumber" type="text" placeholder={{$adr->phoneNumber}}>
                        <p class="input-name">Địa chỉ nhận hàng</p>
                        <input name="address" type="text" placeholder="{{$adr->address}}">
                        <p class="input-name">Tỉnh,thành phố</p>
                        <input name="province" type="text" placeholder={{$adr->province}}>
                        <input name="id" type="hidden" value={{$adr->id}}>
                        <input type="submit" value="Ok">
                    </form>
                </div>
                <a class="delete" href="#">Xóa <i class="far fa-trash-alt"></i></a>
            </div>
        </div>
        @endforeach

    </div>
</div>
    @stop