@extends('admin.master')
@section('main')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container">
  <form class="well form-horizontal" action=" " method="post"  id="contact_form">
    <fieldset>

      <!-- Form Name -->
      <legend><b>Chi tiết đơn</legend>
      <div
              style="
 margin:0 4% 2% 4%;
  letter-spacing: 1px;
"
              >

          <table class="infor">
            <tr>
              <td>1)Tên khách hàng</td>
              <td><span >:name</span></td>
            </tr>

            <tr>
              <td>2)Địa chỉ</td>
              <td><span >:address</span></td>
            </tr>

            <tr>
              <td>3)Số Điện thoại</td>
              <td><span >:phone number</span></td>
            </tr>
          </table>


      </div>
      <style>
        .headTable{
          color:green;
        }
      </style>
      <!-- Text input-->

        <div class="row">
          <div class="col-xs-10">
            <div class="table-responsive billTable" data-pattern="priority-columns">
              <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
                <caption class="text-center">Hóa đơn điện tử</caption>
                <thead style="backgroud:blue;">
                <tr>
                  <th class="headTable">Mã chi tiết đơn</th>
                  <th class="headTable" data-priority="1">Tên sách</th>
                  <th class="headTable" data-priority="2">Giá</th>
                  <th class="headTable" data-priority="3">Số lượng</th>
                  <th class="headTable"  data-priority="4">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill_details as $detail)

                <tr>
                  <td style="text-align: center !important;">{{$detail->id}}</td>
                  <td style="text-align: center !important;">{{$detail->bookName}}</td>
                  <td style="text-align: center !important;">{{$detail->price}}</td>
                  <td style="text-align: center !important;">{{$detail->quantity}}</td>
                  <td style="text-align: center !important;">{{$detail->total}}</td>
                </tr>
                @endforeach()

                </tbody>
                @foreach($bills as $bill)
                <tfoot>
                <tr>
                  <td class="rightConner"></td>
                  <td class="leftConner rightConner"></td>
                  <td class="leftConner rightConner"></td>
                  <td class="leftConner rightConner">Tổng Tiền  :</td>
                  <td style="text-align: center !important;" class="leftConner totalBill">{{$bill->total}}(VNĐ)</td>
                </tr>
                </tfoot>
                  @endforeach
              </table>
            </div><!--end of .table-responsive-->
          </div>
        </div>

    </fieldset>
  </form>
  </div>
</div>
<!-- /.container -->

@stop