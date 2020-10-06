@extends('layout.master')
@section('content')


<div class="container d-flex flex-row bd-highlight mb-3">
    <div class="ava ">
        <img class="img" src="/img/ava.png" alt="Avatar">
    </div>
    <div class="info " style="margin-left: 1rem">
        <h2>I'm {{$user->fullname}}</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> Fullname </th>
                    <th scope="col"> Username </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{$user->fullname}} </td>
                    <td> {{$user->username}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->phone}} </td>
                </tr>
        </tbody>
        </table>
        <form>
            <div class="form-group">
                <textarea type="email" class="form-control mess" id="exampleFormControlTextarea1" rows="5" placeholder="Enter your mess"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</div>



@endsection