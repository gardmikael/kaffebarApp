
<!-- Sidebar Holder -->
<nav id="sidebar" class="active">
  <div id="sidebarCollapse" class="sidebar-header">
    <h3>Kaffebær <span>&</span> Bar</h3>
    <strong>KB<i class="fa fa-angle-double-right" aria-hidden="true"></i></strong>
  </div>

  <ul class="list-unstyled components">
    <li class="{{ Request::is('/') ? 'active' : '' }}">
      <a href="{{route('pos.index')}}">
        <i class="fa fa-credit-card" aria-hidden="true"></i>
        POS
      </a>
    </li>

    <li class="{{ Request::is('items*') ? 'active' : '' }}">
      <a href="#productsSubmenu" data-toggle="collapse" aria-expanded="false">
        <i class="fa fa-cubes" aria-hidden="true"></i>
        Varer
      </a>
      <ul class="collapse list-unstyled" id="productsSubmenu">
        <li><a href="{{route('items.index')}}">Oversikt</a></li>
        <li><a href="{{ route('items.create') }}">Registrer ny vare</a></li>
      </ul>
    </li>

    <!--
    <li>
      <a href="#">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
          Kontakt
      </a>
    </li>
    -->
  </ul>

</nav>

<!-- Page Content Holder -->
<div id="content">
    @include('partials._messages')
    @yield('content')
</div>
