@extends('admin.master')
@section('main')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
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
        
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Thông tin sách cơ bản</b></h3>
            </div>

            <div style="padding:10px" class="addBook">
                      <h3 class="box-title"><a href={{ route('getAddBook') }}>Thêm sách</a></h3>
      
         </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tên sách</th>
                  <th>Tác giả</th>
                 <th>Thể loại</th>
                  <th>Giá bán</th>
                  <th>Ngày đăng</th>

                  <th>delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($book as $bk)
                <tr>
                  <th><a class="btn-edit" href={{ route('getEditBook', ['id' => $bk->id]) }}>{{$bk->name}}</a></th>
                  <th>{{$bk->author}}</th>
                  <th>{{$bk->category->name}}</th>
                  <th>{{$bk->price->sellPrice}}</th>
                  <th>{{$bk->created_at}}</th>

                  <th><a href="{{asset('admin/deleteBook/'.$bk->id)}}" class="edb edb-delete"><i class="glyphicon glyphicon-trash"></i></a></th>

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