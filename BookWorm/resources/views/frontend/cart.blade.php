@extends('frontend.master')
@section('main')
<div class="cart">
    <div class="container">
        <form method="post" action="{{ route('getSetBill') }}" id="contact_form">
            <div class="row">

                <div class="col-12 col-lg-9">
                    <div class="item-head">
                        <div class="row">
                            <div class="col-8"> <h5><i id="cart-icon" class="fas fa-cart-plus"></i> Shopping Cart </h5></div>
                            <div class="col-2"><div class="price"> Price</div>   </div>
                            <div class="col-2"><div class="quantity">Quantity</div></div>
                        </div>
                    </div>
                    <div class="line"></div>
                    @if(isset($cartItem))
                    @foreach($cartItem as $ct)
                        @foreach($ct as $item)
                    <div class="item-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-lg-2 col-3">
                                <div class="item-img">
                                    <img src={{URL::asset("storage/image/".$item->image)}} alt="image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-5">
                                <div class="item-infor">
                                    <div class="item-name">
                                        <span id="name">{{$item->name}}</span>
                                        <span id="author">by {{$item->author}}</span>
                                    </div>
                                    <div class="item-type">paper Back</div>
                                    <div class="item-rate">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="item-remain">
                                        <p><span>1450 sản phẩm </span>còn lại</p>
                                    </div>
                                </div>
                            </div>

                                     <div class="col-lg-2 col-2">
                                        <div class="item-price"><span id="price">65</span>$</div>
                                     </div>
                                    <div   class="col-lg-2 col-2 item-quantity-col-2">
                                         <div class="item-quantity ">
                                    <button class="btn-minus" type="button"><i class="fas fa-minus"></i></button>
                                    <input id="quantity" {{"name=quantity".$item->id}} type="text" value="1">
                                    <button class="btn-plus" type="button"><i class="fas fa-plus"></i></button>

                                     </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endforeach
                    @endif
                    <script>

                        $( document ).ready(function () {
                            var total=0;
                            var money=$('.money');
                            function updateTotal(){
                                total=0;
                                var arr=$('.item-body');
                                arr.each(function() {
                                    var price=$(this).find('#price').text();
                                    var quantity=$(this).find('#quantity').val();

                                    total+=price*quantity;

                                })
                                money.text(total);
                            }
                            updateTotal();
                            $totalSelector=$('#money');
                            $('#quantity').change(function () {
                                updateTotal();
                            })
                            $('.btn-minus').click(function () {
                                $inputSelector=$(this).parent().children('input');
                                $quantity=parseInt($inputSelector.val());
                                if($quantity>0){
                                    $quantity-=1;
                                }

                                //update

                                $inputSelector.val($quantity);
                                updateTotal();

                            })
                            $('.btn-plus').click(function () {
                                $inputSelector=$(this).parent().children('input');
                                $quantity=parseInt($inputSelector.val());

                                    $quantity+=1;

                                //update

                                $inputSelector.val($quantity);
                                updateTotal();

                            })
                        });
                    </script>
                    <div class="line"></div>

                    <div class="item-footer">
                        <div class="bill-total">Subtotal(3 item):<span class="money">1250</span>$</div>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="check-out">
                        <div class="bill-total">Subtotal(3 item):<span class="money">1250</span>$</div>
                        <div><button type="submit">Tiến hành thanh toán</button></div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@stop