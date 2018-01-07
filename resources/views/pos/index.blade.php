@extends('layouts.main')

@section('title', 'POS')

@section('content')

<!-- Header -->
<div class="row">
  <div class="col-md-8">
    @include('pos.partials._listview')
  </div>
  <div class="col-md-4">
    <div class="well">
      @include('pos.partials._cart')
    </div>
  </div>
</div>
@include('pos.partials._receipt')

@endsection

@section('scripts')
  <script src="{{ URL::asset('js/pos.js') }}"></script>
@endsection
