@extends('admin.master')
@section('main')


  <div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div style="position: relative;" class="container">

    <form class="well form-horizontal"  method="post" action="{{ route('postAddBook') }}" id="contact_form">
      <fieldset>

        <!-- Form Name -->
        <legend><b>Thêm một cuốn sách tuyệt vời nữa vào kho sách!<b/></legend>

        <!-- Text input-->


{{--        <script src={{URL::asset('lte\filepond-master\filepond-master\dist/filepond.js')}}></script>--}}
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        @include('admin.errors')
        <div class="form-group">

          <div class="col-md-4 imageUploadResponsive inputGroupContainer">


            <input id="imageUpload" name="image" type='file' onchange="readURL(this);" />
            <img id="blah" src="http://placehold.it/180" alt="your image" />
          </div>
        </div>
        <div class="form-group">
          {{ csrf_field() }}
          <label class="col-md-4 control-label">Book Name</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
              <input name="name" placeholder="First Name" class="form-control"  type="text">
            </div>


          </div>

        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" >Author</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="author" placeholder="Last Name" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Category</label>
          <div class="col-md-4 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
              <select name="category" class="form-control selectpicker" >

                @foreach ($category as $ctg)

                  <option value="{{$ctg->id}}">{{$ctg->name}}</option>  //here Code is your JSON object name.
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">


        <!-- Text input-->



        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Language</label>
          <div class="col-md-4 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
              <select name="language" class="form-control selectpicker" >

                <option value="Tiếng việt">Tiếng việt</option>
                <option value="Tiếng anh">Tiếng anh</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label">Type</label>
          <div class="col-md-4 selectContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
              <select name="type" class="form-control selectpicker" >
                <option value="1">Ebook</option>
                <option value="2">PaperBook</option>
              </select>
            </div>
          </div>
        </div>
          <div class="form-group">
            <label class="col-md-4 control-label">Word Wise</label>
            <div class="col-md-4 selectContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                <select name="wordwise" class="form-control selectpicker" >

                    <option value="1">Yes</option>
                    <option value="0">No</option> //here Code is your JSON object name.

                </select>
              </div>
            </div>
          </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">Page Number</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
              <input name="pageNumber" placeholder="number" class="form-control" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
        <div class="form-group">
          <label class="col-md-4 control-label">Size</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
              <input name="size" placeholder="Size" class="form-control" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label">Weight</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
              <input name="weight" placeholder="Weight" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Select Basic -->



        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Buy Price</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
              <input name="buyPrice" placeholder="0.00" class="form-control"  type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label">Sell Price</label>
          <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-log-out"></i></span>
              <input name="sellPrice" placeholder="0.00" class="form-control"  type="text">
            </div>
          </div>
        </div>


        <!-- Text input-->


        <!-- radio checks -->



        <!-- Text area -->

        <div class="form-group">
          <label class="col-md-4 control-label">Project Description</label>
          <div class="col-md-8 txtFixed inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <textarea class="form-control" id="summary-ckeditor" name="description" placeholder="Project Description"></textarea>
            </div>
          </div>
        </div>
        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'summary-ckeditor' );
        </script>
        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <button type="submit" class="btn btn-warning" >Add <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>

      </fieldset>
    </form>
  </div>
</div><!-- /.container -->
<!-- /.content -->

@stop

