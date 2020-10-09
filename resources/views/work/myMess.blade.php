@extends('layout.master')
@section('content')
<h2>Receive : </h2>
<table class="table table-bordered" style="margin-bottom:5rem">
    <tr>
        <th>Message</th>
        <th>Detail</th>
    </tr>
    @foreach ($data as $item)
    <tr>
        <td>{{$item->message}}</td>
        <td>
            <a class="btn btn-danger" href="/deleteMess/{{$item->id}}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
<h2>Send To:</h2>
<table class="table table-bordered">
    <tr>
        <th>Message</th>
        <th>Detail</th>
    </tr>
    @foreach ($dataSend as $item)
    <tr>
        <td>{{$item->message}}</td>
        <td>
            <a class="btn btn-danger" href="/deleteMess/{{$item->id}}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection