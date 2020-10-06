@extends('layout.master')
@section('content')
<div class="w3-container w3-padding-64 w3-center" id="team">
    <h1>Welcome back {{ ucfirst(Auth()->user()->fullname) }}</h1>
    <h2>Let's do your homework...!!!</h2>
</div>

<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
</div>

@endsection