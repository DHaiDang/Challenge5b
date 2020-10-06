@extends('layout.master')
@section('content')

<table class="table table-bordered ">
    <thead>
        <tr>
            <th scope="col"> Fullname  </th>
            <th scope="col"> View</th>
        </tr>
    </thead>
    <tbody>
         @foreach($users as $user)
          <tr>
            <td> {{$user->fullname}} </td>
            <td>
                <a href="{{ url('/detail/' . $user->id) }}" class="btn btn-xs btn-info">Detail</a>
                @if ($isAdmin === 1)
                    <a href="{{ url('/info/' . $user->id) }}" class="btn btn-xs btn-warning">Update</a>
                    <a href="{{ url('/deleteById/' . $user->id) }}" class="btn btn-xs btn-danger">Delete</a>
                @endif
            </td>
          </tr>
         @endforeach
   </tbody>
</table>

@endsection