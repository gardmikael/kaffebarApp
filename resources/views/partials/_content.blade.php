<div id="content">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
          <i class="glyphicon glyphicon-align-left"></i>
          <span>Minimer</span>
         </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Page 1</a></li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
          <li><a href="#">Page 4</a></li>
        </ul>
      </div>

    </div>
  </nav>
  @include('partials._messages')
  @yield('content')
</div> <!-- end of .content -->
