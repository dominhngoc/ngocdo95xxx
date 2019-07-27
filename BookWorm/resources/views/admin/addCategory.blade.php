@extends('admin.master')
@section('main')
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
  </script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div style="position: relative;" class="container">

    <form class="well form-horizontal" action={{route('postAddCategory')}} method="post"  id="contact_form">
      <fieldset>


        <!-- Form Name -->
        <legend><b>Thêm danh mục sách</b></legend>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Tên loại sách</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
              <input  name="name" class="form-control"  type="text">
            </div>
          </div>
        </div>
        {{ csrf_field() }}
        <div class="form-group">
          <label class="col-md-4 control-label">Thuộc lớp</label>
          <div class="col-md-4 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
              <select name="dcategory" class="form-control selectpicker" >


                @foreach($dcategory as $dctg)
                <option value={{$dctg->id}}>{{$dctg->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4 selectContainer">
            <a class="add-btn" href="{{asset('admin/getAddDCategory')}}">Add</a>
            <a class="edit-btn" href="{{asset('admin/getEditDCategory')}}">Edit</a>
            <a class="del-btn" href="{{asset('admin/getDeleteDCategory')}}">Delete</a>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label">Icon</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
              <input  name="logo"  class="form-control"  type="text">
            </div>
          </div>
        </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Click link to get font</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">

                (<a target="_blank" href="https://fontawesome.com/icons?d=gallery">Get logo boostrap</a>)
              </div>
            </div>
          </div>

        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>
        @include('admin.errors')
      </fieldset>
    </form>

  </div>

  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Logo</th>
        <th>Tên loại sách</th>
        <th>Thuộc lớp</th>
        <th>Số sách</th>
        <th>Xóa</th>
      </tr>
      </thead>
      <tbody >
      @foreach($category as $ctg)
      <tr>

        <th>{!! $ctg->logo !!}</th>
        <th>

          <form style="float:left; width: 90%" class="editCategory" action="">
            <input id="categoryName{{$ctg->id}}" class="inputCategory inputCategory{{$ctg->id}}" value="{{$ctg->name}}" style=" text-align:center;margin:0 30px;input: 80%;width: 60%;" type="text">
            <a id="okButton{{$ctg->id}}"  href="#">Ok</a>
            <script>
                $('#okButton{{$ctg->id}}').hide();
                $( document ).ready(function() {
                    // $("input").prop('disabled', true);


                    $("#editButton{{$ctg->id}}").click(function () {
                        $('#okButton{{$ctg->id}}').show();
                        $('.inputCategory{{$ctg->id}}').removeClass('inputCategory')
                    });





                    $('#okButton{{$ctg->id}}').click(function (e) {
                        e.preventDefault();
                            $('#okButton{{$ctg->id}}').hide();
                            $('.inputCategory{{$ctg->id}}').addClass('inputCategory')
                            var id = '{{$ctg->id}}';
                            var name = $("#categoryName"+'{{$ctg->id}}').val();

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                }
                            });
                        $.ajax({
                            url: "{{ asset('admin/getEditCategory') }}",
                            method: 'get',
                            data: {
                                id:id,
                                name:name
                            },
                            success: function(category){


                            }});

                    });
                });
            </script>

          </form>

          <span   style="
                        display: inline-block;
                        margin-left: -60px;
                       color: blue;
                       font-size: 120%;"
                  id="editButton{{$ctg->id}}"
                class="input-group-pencil"><i class="glyphicon glyphicon-pencil"></i></span>

        </th>
        <th>{{$ctg->dcategory->name}}</th>
        <th>{{$ctg->bookNumber}}</th>
        <th><a href={{asset('admin/getDeleteCategory/'.$ctg->id)}}><i class="glyphicon glyphicon-trash"></i></a> </th>
      </tr>
      @endforeach
      </tbody>
      <tfoot>

      </tfoot>
    </table>
  </div>

  <a href="#" id="contactUs">Contact Us</a>
  <div id="dialog" title="Contact form">
    <p>appear now</p>
  </div>
  <script>
      $(document).ready(function () {
          $("#dialog").dialog({
              autoOpen : false, modal : true, show : "blind", hide : "blind"
          });

          // next add the onclick handler
          $("#contactUs").click(function() {
              $("#dialog").dialog("open");
          });
      });
          // this initializes the dialog (and uses some common options that I do)


     
  </script>

</div><!-- /.container -->
<!-- /.content -->

  @stop