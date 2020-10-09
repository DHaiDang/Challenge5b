@extends('layout.master')
@section('content')

@if($result == 'correct')
<h2 style="color:red">Congrate</h2>
<h4 style="color:red"><i>Here is context of your answer : </i></h4>
<hr>
<?php

    $myfile = fopen($path, "r") or die("Unable to open file!");
    echo fread($myfile,filesize($path));
    fclose($myfile);
?>
@endif
@if($result == 'false')
<div class="alert alert-danger" role="alert">
Wrong answer, please try again
</div>
<a href="/challenge" class="btn btn-danger">Back</a>
@endif
@endsection