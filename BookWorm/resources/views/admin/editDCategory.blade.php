@extends('admin.master')
@section('main')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div style="position: relative;" class="container">

            <form class="well form-horizontal" action={{route('postEditDCategory')}} method="post"  id="contact_form">
                <fieldset>


                    <!-- Form Name -->
                    <legend><b>Thêm lớp sách</b></legend>

                    <!-- Text input-->
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
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tên lớp sách</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                                <input  name="name" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-warning" >Edit <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>


        <!-- /.box-body -->


    </div><!-- /.container -->
    <!-- /.content -->

@stop