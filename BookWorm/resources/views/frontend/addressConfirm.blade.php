@extends('frontend.master')
@section('main')

<div class="adress">
    <div class="container">
        <h4><i class="fas fa-map-marker-alt"></i> Address Confirm</h4>
        <div class="row">

            <div class="col-lg-9 col-12">
                <div class="address-box">
                    <div class="row">


                        @foreach($address as $adr)
                        <div class="col-lg-4 col-12">
                            <div class="adress-item">
                                <div class="item-infor">
                                    <h5>{{$adr->name}}</h5>
                                    <p class="province">{{$adr->province}}</p>
                                    <p class="adress-detail">{{$adr->address}}</p>
                                    <p class="phone">{{$adr->phoneNumber}}</p>
                                </div>
                                <a href={{URL::asset('getPayment/'.$adr->id)}}>
                                    <button
                                        @if($adr->id==$default_key)
                                        id="button-default" class="button" type="button">
                                           Địa chỉ mặc định
                                        @else
                                        class="button" type="button">
                                                 Chọn địa chỉ này
                                        @endif
                                        </button>
                                </a>




                            </div>
                        </div>
                         @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="adress-add">
                    <a href="adressAdd.html">Thêm địa chỉ mới</a>
                </div>
                <div class="payment-step">

                    <img src={{URL::asset("frontend/image/item2.jpg")}} alt="image">
                    <div>
                        <a href={{URL::asset('getPayment/0')}}>
                        <button>Next</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop