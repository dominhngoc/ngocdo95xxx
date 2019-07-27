@extends('frontend.manager')
@section('box')

        <div class="billDetailManger-address">
            <table class="infor">
                <thead>
                <td colspan="2">  <h5>Địa chỉ nhận hàng</h5> </td>
                <td></td>
                </thead>
                <tbody>

                <tr>
                    <td class="bold">1)Tên khách hàng</td>
                    <td><span >:
                            @foreach($bill as $b)
                            {{$b->address->name}}
                            @endforeach
                        </span></td>
                </tr>
                <tr>
                    <td class="bold">2)Tỉnh</td>
                    <td><span >:
                             @foreach($bill as $b)
                                {{$b->address->province}}
                            @endforeach</span></td>
                </tr>
                <tr>
                    <td class="bold">3)Địa chỉ</td>
                    <td><span >:
                             @foreach($bill as $b)
                                {{$b->address->address}}
                            @endforeach
                        </span></td>
                </tr>

                <tr>
                    <td class="bold">4)Số Điện thoại</td>
                    <td><span >:
                             @foreach($bill as $b)
                                {{$b->address->phoneNumber}}
                            @endforeach</span></td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="billDetailManger">
            <div class="billDetailManger-head">
                <div class="row">
                    <div class="col-lg-3">Link</div>
                    <div class="col-lg-3">Tên sách</div>
                    <div class="col-lg-2">Giá sách</div>
                    <div class="col-lg-2">Số lượng</div>
                    <div class="col-lg-2">Thành tiền</div>
                </div>
            </div>
            @foreach($bill_details as $bd)
            <div class="billDetailManger-body">
                <div class="row">
                    <input type="hidden" name="_token" value="G5VvSj8jzrf4XS0hFtCdA0ScQnUY4dY9s6d2QzsA">
                    <div class="col-lg-3 col-3">
                        <div class="item-img">
                            <a href="#">
                                <img src=http://localhost:8000/storage/image/51H8cXlGepL._SX320_BO1,204,203,200_.jpg alt="image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-5">
                        <div class="">
                            <div class="book-name">
                                <span id="name">{{$bd->bookName}}</span>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-2 col-2">
                        <div class=""><span id="price">{{$bd->price}}</span>$</div>
                    </div>
                    <div   class="col-lg-2 col-2 item-quantity-col-2">
                        <div class=" ">
                            {{$bd->quantity}}
                        </div>
                    </div>
                    <div   class="col-lg-2 col-2 item-quantity-col-2">
                        <div class=" ">
                            {{$bd->total}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="billDetailManger-footer">
                Sub total: <span>
                    @foreach($bill as $b)
                        {{$b->total}}
                    @endforeach
                          $</span>
            </div>
        </div>
    </div>

@stop