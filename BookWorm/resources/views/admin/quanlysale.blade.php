@extends('admin.master')
@section('main')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div style="position: relative;" class="container">

    <form class="well form-horizontal" action="{{ route('postSale') }}" method="post"  id="contact_form">
      <fieldset>

        <!-- Form Name -->
        <legend><b>Tạo chương trình sale</legend>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Tên chương trình</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
              <input  name="saleName" placeholder="First Name" class="form-control"  type="text">
            </div>
          </div>
        </div>
      {{ csrf_field() }}
        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Giá sale</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="salePrice" placeholder="sale name" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->


        <!-- Text input-->



        <!-- Text input-->


        <div class="form-group">
          <label class="col-md-4 control-label">Sale Book Category</label>
          <div class="col-md-4 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>

              <select name="category" class="form-control selectpicker" >
                @foreach($category as $ctg)
                <option value={{$ctg->id}}>{{$ctg->name}}</option>
                @endforeach
              </select>

            </div>
          </div>
        </div>
        <!-- Text input-->
        @include('admin.errors')
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-warning" >CREATE <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>

  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Tên chương trình</th>
        <th>Giá khuyến mãi</th>
        <th>Thể loại sách được khuyến mãi</th>
        <th>Xóa</th>
      </tr>
      </thead>
      <tbody>
      @foreach($sale as $s)
      <tr>
        <th>{{$s->saleName}}</th>
        <th>{{$s->salePrice}}</th>
        <th>{{$s->categorySale}}</th>
        <th><a href={{asset('admin/getDeleteSale/'.$s->id)}}><i class="glyphicon glyphicon-trash"></i></a> </th>
      </tr>
      @endforeach
      </tbody>
      <tfoot>

      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->

</div>
<!-- /.box -->

@stop