@extends('layout.master')
@section('content')

<div class="w3-row-padding w3-padding-64 " id="work">
  <div class="w3-quarter">
    <h1>Challenge</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <div class="w3-threequarter">
    <div class="w3-container">
      <h3>List Challenge</h3>
      <div>
        @foreach ($files as $file)
          <table class="table table-bordered">
            <tr>
              <th>File</th>
              <th>Download</th>
            </tr>
            <tr>
              <td>{{$file->getFileName()}}</td>
              <td>
                  <a class="btn btn-primary" href="download/{{$file->getFileName()}}">Download</a>
                @if ($isAdmin ===1)
                  <a class="btn btn-danger" href="delete/{{$file->getFileName()}}">Delete</a>
                @endif
                
              </td>
            </tr>
          </table>
        @endforeach
      </div>
    </div>
  </div>
</div>
@if ($isAdmin === 1)
<div class="w3-container" style="position:relative">
  <button onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-info btn-circle ">+</button>
</div>
@endif
<!-- Modal-->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Challenge</h4>
    </header>
    <div class="w3-container">
    <form action="{{url('upload')}}" style="margin-bottom:5rem;" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <label for="content"><h5>Content</h5></label>
      <textarea type="text" class="form-control mess" name="content" id="exampleFormControlTextarea1" rows="8" style="min-width: 100%" placeholder="Entercontent"></textarea>
      <input type="file" name="file" id="fileToUpload">
      <input type="submit" value="Submit">
    </form> 
    </div>
  </div>
</div>
@endsection