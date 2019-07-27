@if(isset($data))
<ul class="dropdown-menu" style="display:block; position:relative">

    @foreach($data as $row)
    <li><a href={{URL::asset('getSearchUrl/'.urlencode($row->name))}}>{{$row->name}}   <span id="by">by </span> <span id="author">{{$row->author}}</span></a></li>
      @endforeach

</ul>
@endif