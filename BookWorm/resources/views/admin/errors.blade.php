@if ($errors->any())


            @foreach ($errors->all() as $error)
                <div style="margin-bottom:0;" class="form-group">
                <div  class="col-md-4"></div>
                <div  style="height: 60px;" class="col-md-4"> <p class="alert-danger alert">{{ $error }}</p></div>
                </div>
            @endforeach

@endif