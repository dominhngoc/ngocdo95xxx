@extends('admin.master')
@section('main')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div style="position: relative;" class="container">

            <form class="well form-horizontal" action={{route('postDeleteDCategory')}} method="post"  id="contact_form">
                <fieldset>


                    <!-- Form Name -->
                    <legend><b>Thêm lớp sách</b></legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tên lớp</label>
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

                    {{ csrf_field() }}





                    <!-- Success message -->
                    <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-warning" >Delete <span class="glyphicon glyphicon-send"></span></button>
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