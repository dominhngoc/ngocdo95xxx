@extends('admin.master')
@section('main')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div style="position: relative;" class="container">

            <form class="well form-horizontal" action={{route('postAddDCategory')}} method="post"  id="contact_form">
                <fieldset>


                    <!-- Form Name -->
                    <legend><b>Thêm lớp sách</b></legend>

                    <!-- Text input-->

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


        <!-- /.box-body -->


    </div><!-- /.container -->
    <!-- /.content -->

@stop