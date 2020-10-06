<!DOCTYPE html>
<html>
<head>
  <title>Student Management</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="icon" href="/img/logo.png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <link rel="stylesheet" href=  
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
        
    <script src=  
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">  
    </script>  
        
    <script src=  
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">  
    </script>  
        
    <script src=  
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">  
    </script>  

  <link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    function openNav() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }
  </script>
</head>
<body>
<div class="d-flex" id="wrapper">
    @include('layout.header')
    <div class="container-fluid">
      @section('content') @show
    </div>
</div>
    

</body>
</html>



