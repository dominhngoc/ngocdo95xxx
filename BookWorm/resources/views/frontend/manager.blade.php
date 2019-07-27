@extends('frontend.master')
@section('main')
    <div class="manage">
        <div class="container">
            <div class="account-link clearfix">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><i class="fas fa-angle-double-right"></i></li>
                    <li><a href="#">Quản lý tài khoản</a></li>



                </ul>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <ul class="account-menu">
                        <li class="account-actived"><a href={{URL::asset('getAccountManager')}}><i class="fas fa-user"></i><span class="category-name">Thông tin tài khoản</span></a>    </li>
                        <li><a href="#"><i class="fas fa-bullhorn"></i><span class="category-name">Thông báo khuyến mãi</span></a></li>
                        <li><a href={{URL::asset('getBillManager')}}><i class="fas fa-file-invoice-dollar"></i><span class="category-name">Quản lý đơn hàng</span></a></li>
                        <li ><a href={{URL::asset('getAddressManager')}}><i class="fas fa-map-pin"></i><span class="category-name">Quản lý địa chỉ</span></a></li>
                        <li><a href="#"><i class="fas fa-map-pin"></i><span class="category-name">Quản lý mật khẩu</span></a></li>
                    </ul>
                </div>
                <div class="col-lg-9 col-12 col-md-8">
                    @yield('box')
                </div>
            </div>

        </div>
    </div>
@stop