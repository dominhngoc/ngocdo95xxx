@extends('admin.master')
@section('main')
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
  </script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Quản lý đơn hàng
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <b>TRẠNG THÁI ĐƠN HÀNG</b>
      </div>
    </div>
    <div  class="row">
      <div class="col-xs-3 statusBill-0">
        <i class="glyphicon glyphicon-minus"></i>  Chưa chọn tài xế
      </div>
      <div class="col-xs-3 statusBill-1">
        <i class="glyphicon glyphicon-minus"></i>  Đang giao
      </div>
      <div class="col-xs-3 statusBill-2">
        <i class="glyphicon glyphicon-minus"></i>  Thành công
      </div>
      <div class="col-xs-3 statusBill-3">
        <i class="glyphicon glyphicon-minus"></i>  Thất bại
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><b>Danh sách đơn</b></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Mã đơn</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
                <th>Ngày tạo</th>
                <th>Địa chỉ khách hàng</th>
                <th>Tài xế</th>

              </tr>
              </thead>
              <tbody>
              @foreach($bill as $b)
              <tr>
                <th><a href={{asset('admin/getBillDetail/'.$b->id)}}> {{$b->id}}</a></th>
                <th class=@if($b->status=='Pending')
                          statusBill-0
                        @elseif($b->status=='Deliveried')
                         statusBill-1
                        @elseif($b->status=='Success')
                         statusBill-2
                        @elseif($b->status=='Fail')
                        statusBill-3
                          @endif
                >{{$b->status}}</th>
                <th>{{$b->note}}</th>
                <th>{{$b->dateOrder}}</th>
                <th>{{$b->address->address}}</th>

                <th> <select  id="shipper{{$b->id}}" class="form-control shipper selectpicker" >
                    @foreach($shipper as $shp)
                      @if($shp->id!=3)
                      <option @if($b->id_shipper==$shp->id)
                              selected
                              @endif value="{{$shp->id}}.{{$b->id}}">{{$shp->name}}
                      </option>
                      @endif
                    @endforeach
                  </select></th>

              </tr>
              <script>
                  jQuery(document).ready(function(){
                      jQuery('#shipper{{$b->id}}').change(function(e){
                           var str=jQuery('#shipper'+'{{$b->id}}').val();
                           var res=str.split(".");
                        e.preventDefault();
                        $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                        });
                        jQuery.ajax({
                        url: "{{ asset('admin/editShipperOnBill') }}",
                        method: 'get',
                        data: {
                            id_shipper: res[0],
                            id_bill: res[1],
                        },
                        success: function(result){
                        jQuery('.alert').show();
                        jQuery('.alert').html(result.success);
                        }});
                      });
                  });
              </script>
              @endforeach

              </tbody>

              <tfoot>

              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->


    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
  @stop