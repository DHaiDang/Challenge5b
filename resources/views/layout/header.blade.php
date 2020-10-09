<!-- Sidebar -->
<!-- <div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading w3-cyan" ><h3 style="margin:0 !important;color:white;">Viettel</h3></div>
  <div class="list-group list-group-flush">
    <a href="/" class="list-group-item list-group-item-action bg-light">Dashboard</a>
    <a href="/homework" class="list-group-item list-group-item-action bg-light">Homework</a>
    <a href="/challenge" class="list-group-item list-group-item-action bg-light">Challenge</a>
    <a href="/list" class="list-group-item list-group-item-action bg-light">List Student</a>
    <a href="/infoo" class="list-group-item list-group-item-action bg-light">Change Your infomation</a>
    <a href="/logout" class="list-group-item logout logout list-group-item-action bg-light">Logout</a>
  </div>
</div> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand linkBut" href="/">Viettel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link active linkBut" href="/list">List<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active linkBut" href="/infoo">Infomation</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active linkBut" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Job
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item " href="/homework">Homework</a>
          <a class="dropdown-item " href="/challenge">Challenge</a>
          <a class="dropdown-item " href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active linkBut" href="/message">Message</a>
      </li>
    </ul>
    <div class="row" style="margin-right:2rem">
      <a class="nav-link logout" style="color:white" href="/logout">Logout</a>
      <h6 style="color:white;">{{ Auth::user()->username }}</h6>
    </div>
  </div>
</nav>