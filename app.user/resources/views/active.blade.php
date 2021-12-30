
<table border="2">
    <tr>
<td>ID</td>
<td>ACTION</td>
    </tr>
    @foreach($product as $ps)
    <tr>
<td>{{$ps->id}}</td>
<td>
 @if ($ps->status === 0)
<a href="/update/{{$ps->id}}/{{1}}">ACTIVE </a>
@else
<a href="/update/{{$ps->id}}/{{0}}">DEACTIVE </a>
@endif</td>
    </tr>
    @endforeach
</table>