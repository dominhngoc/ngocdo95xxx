@extends('admin.master')
@section('main')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="position: relative;" class="container">
      @foreach($book as $bk)
      <form class="well form-horizontal" method="post" action={{ route('postEditBook',['id' => $bk->id])}} id="contact_form">
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
              <img id="blah" src={{asset('storage/image/'.$bk->image)}} />
            </div>
          </div>
          <div class="form-group">
            {{ csrf_field() }}

            <label class="col-md-4 control-label">Book Name</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                <input value="{{$bk->name}}" name="name"  class="form-control"  type="text">
              </div>


            </div>

          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label" >Author</label>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="author" value="{{$bk->author}}"  class="form-control"  type="text">
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

                    <option @if($bk->category->id==$ctg->id)
                            selected
                            @endif() value="{{$ctg->id}}">{{$ctg->name}}</option>  //here Code is your JSON object name.
                  @endforeach
                </select>
              </div>
            </div>
          </div>



            <!-- Text input-->



            <!-- Text input-->

            <div class="form-group">
              <label class="col-md-4 control-label">Language</label>
              <div class="col-md-4 selectContainer">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                  <select name="language" class="form-control selectpicker" >

                    <option @if($bk->language=='Tiếng Việt')
                              selected
                            @endif()value="Tiếng việt">Tiếng việt</option>
                    <option @if($bk->language=='Tiếng anh')
                            selected
                            @endif()value="Tiếng anh">Tiếng anh</option>
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
                    <option @if($bk->type==0)
                            selected
                            @endif() value="0">Ebook</option>
                    <option  @if($bk->language==1)
                             selected
                             @endif() value="1">Paper Book</option>
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

                    <option @if($bk->wordwise==1)
                         selected
                              @endif() value="1">Yes</option>
                    <option @if($bk->wordwise==0)
                            selected
                            @endif()  value="0">No</option> //here Code is your JSON object name.

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
                  <input name="pageNumber" value="{{$bk->pageNumber}}"  class="form-control" type="text">
                </div>
              </div>
            </div>
            <div class="form-group">

                <label class="col-md-4 control-label">Size</label>
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                    <input name="size" value="{{$bk->size}}" class="form-control" type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Weight</label>
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
                    <input name="weight" value={{$bk->weight}}  class="form-control"  type="text">
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
                    <input name="buyPrice" value={{$bk->price->buyPrice}}  class="form-control"  type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Sell Price</label>
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-log-out"></i></span>
                    <input name="sellPrice" value={{$bk->price->sellPrice}}  class="form-control"  type="text">
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
                    <textarea class="form-control"  id="summary-ckeditor" name="description" >{{$bk->description}}</textarea>
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
        @endforeach
    </div>
  </div><!-- /.container -->
  <!-- /.content -->

@stop

