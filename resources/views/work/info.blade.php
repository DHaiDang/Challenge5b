@extends('layout.master')
@section('content')

<div class="container" style="margin-top : 5rem">
    <h2>Hello {{$fullname}}</h2>
    <p><em>Do you wanna to change your infomation ?</em></p>
    <form action="/update/{{$id}}" method="POST" id="regForm" class="col-md-4" >
        {{ csrf_field() }}
        <div class="form-label-group">
            <input type="text" id="inputName" name="username" class="form-control" value={{$username}} disabled>
            <label for="inputName">Username</label>
            @if ($errors->has('username'))
            <span class="error">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div class="form-label-group">
            <input type="text" id="inputFullname" name="fullname" class="form-control" value={{$fullname}} disabled>
            <label for="inputFullname">Fullname</label>
            @if ($errors->has('fullname'))
            <span class="error">{{ $errors->first('fullname') }}</span>
            @endif

        </div>
        <div class="form-label-group">
            <input type="text" id="inputPhone" name="phone" class="form-control" value={{$phone}}>
            <label for="inputPhone">Phone number</label>
            @if ($errors->has('phone'))
            <span class="error">{{ $errors->first('phone') }}</span>
            @endif
        </div>
        <div class="form-label-group">
            <input type="email" name="email" id="inputEmail" class="form-control" value={{$email}} >
            <label for="inputEmail">Email address</label>
            @if ($errors->has('email'))
            <span class="error">{{ $errors->first('email') }}</span>
            @endif    
        </div> 

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control"value={{$password}}>
            <label for="inputPassword">Password</label>
            
            @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
            @endif  
        </div>

        <button class="btn btn-lg btn-info btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Update</button>
    </form>
</div>

@endsection