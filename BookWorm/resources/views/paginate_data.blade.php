@foreach($data as $row)
    <tr>
        <td id="id">{{ $row->id }}</td>
        <td id="ten">{{ $row->name }}</td>
        <td id="ten">{{ $row->author }}</td>
        {{--<td>{{ $row->logo }}</td>--}}
        {{--<td>{{ $row->bookNumber }}</td>--}}
    </tr>
@endforeach