@extends('layouts.main')

@section('title', 'Alle varer')

@section('content')

<!-- Header -->
<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h1>Alle varer</h1>
    </div>
    <ul class="product-list">
      @foreach ($items as $item)
        <li class="product">
          <div class="box">
            <img src='{{ asset("storage/$item->img_path")}}'/>
            <h2>{{$item->name}}</h2>
            <p>{{$item->item_group}}</p>
            <p>{{$item->sales_item->price or "-"}} <span>NOK</span></p>
            <div class="row btn-group">
              <div class="col-sm-6">
                <form action="{{route('items.edit', $item->id)}}" method="get">
                  {{ csrf_field() }}
                  <button class="btn btn-primary btn-xs">Endre</button>
                </form>
              </div>
              <div class="col-sm-6">
                <!-- REMOVED delete-button. See Readme
                <form action="{{route('items.destroy', $item->id)}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <button class="btn btn-danger btn-xs">Slett</button>
                </form>
                -->
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>

</div>

@endsection

@section('scripts')
  <script src="{{ URL::asset('js/pos.js') }}"></script>
@endsection
