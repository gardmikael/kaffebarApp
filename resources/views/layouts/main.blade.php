<!DOCTYPE html>
<html lang="no">
  <head>
    @include('partials._head')
  </head>
  <body>
    <div id="wrapper" class="wrapper">
      @include('partials._nav')
      @include('partials._sidebar')
    </div> <!-- end of .wrapper -->

    @include('partials._javascript')
    @yield('scripts')
  </body>

</html>
