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
          <table class="table table-bordered">
            <tr>
              <th>Challenge</th>
              <th>Join</th>
            </tr>
            @foreach($datas as $item)
              <tr>
                <td>Challenge {{ $loop->index +1}}</td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-todo='{"id":{{$item->id}}}' data-whatever="{{$item->description}}">Submit</button>
                 @if ($isAdmin ===1)
                    <a class="btn btn-danger" href="/deleteChallenge/{{$item->id}}">Delete</a>
                  @endif
                </td>
              </tr>
            @endforeach
          </table>
      </div>
    </div>
  </div>
</div>

@if ($isAdmin === 1)
<div class="w3-container" style="position:relative">
  <button onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-info btn-circle ">+</button>
</div>
@endif

<script>
var dang
$(function(){
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient = button.data('whatever')
      var modal = $(this)
      var todoId = button.data('todo').id;
      dang = todoId
      modal.find('.modal-title').text('Submit your answer')
      // modal.find('.modal-contents').text( 'Content: ' + recipient)
      modal.find('.modal-contents').text( 'Content: ' + recipient)
    })
})

function validateForm() {
    document.getElementById('formSubmit').setAttribute("action", "/submitChallenge/"+dang)
}
</script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>

<!-- Modal add challenge-->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container  w3-dark-grey w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button  w3-dark-grey w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Challenge</h4>
    </header>
    <div class="w3-container">
    <form action="{{url('create')}}" style="margin-bottom:2rem;" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <label for="content"><h5>Content</h5></label>
      <textarea type="text" class="form-control mess" name="content" id="exampleFormControlTextarea1" rows="8" style="min-width: 100%" placeholder="Entercontent"></textarea>
      <input type="file" name="file" id="fileToUpload">
      <input type="submit" value="Submit">
    </form> 
    </div>
  </div>
</div>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Challenge </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="formSubmit" onSubmit="validateForm()">
        {{ csrf_field() }}
          <div class="form-group">
            <h5 class="modal-contents" id="exampleModalLabel">Content</h5>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Your answer </label>
            <textarea class="form-control" id="message-text" name="result"></textarea>
          </div>
          <input type="submit" class="btn btn-warning" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection