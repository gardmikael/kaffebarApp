<!DOCTYPE html>
<html lang="no">
  <head>
    @include('partials._head')
  </head>
  <body>
    <div id="wrapper" class="wrapper">
      @include('partials._nav')
      @include('partials._sidebar')
      <!-- Page Content Holder -->
      <div id="content">
          @include('partials._messages')
          @yield('content')
      </div>
    </div> <!-- end of .wrapper -->
    @include('partials._javascript')
    @yield('scripts')
  </body>
</html>
