<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>KaffebarApp | @yield('title')</title>

<!-- Kaffebar CSS -->
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

@yield('stylesheets')
