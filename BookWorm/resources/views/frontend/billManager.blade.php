@extends('frontend.manager')
@section('box')
<div class="bill-box">
    <div class="bill-header">
        <h5>Quản lý đơn hàng</h5>

    </div>
    <div class="bill-main">

        <table>

            <thead>

            <tr>
                <td>Mã đơn hàng</td>
                <td>Ngày mua</td>
                <td>Sản phẩm</td>
                <td>Tổng tiền</td>
                <td>Trạng thái đơn</td>

            </tr>
            </thead>
            <tbody>
            @foreach($bills as $b )
            <tr>
                <td><a href={{URL::asset('getBillDetailsManager/'.$b->id)}}>{{$b->id}}</a></td>
                <td>{{$b->created_at}}</td>
                <td>
                    <span id="book-first">
                        @foreach($b->bill_details as $bd)
                            @if($loop->first)
                                {{$bd->bookName}}
                                 </span>... va
                                 <span id="more-number"> {{$loop->count-1}}</span> san pham khac

                            @endif

                        @endforeach

                </td>
                <td>{{$b->total}}</td>
                <td>{{$b->status}}</td>

            </tr>
            @endforeach

           </tbody>
        </table>
        <div class="bill-container">
            <div class="bill-link">
                {{--{{ $bills->links() }}--}}
            </div>
        </div>
    </div>
</div>
@stop