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
        <product :show-add-button="false" name="{{$item->name}}" :price="{{count($item->sales_item) ? $item->sales_item->price : 0 }}" img-path="{{asset("storage/$item->img_path")}}" @add-product="addItem({{$item->id}},'{{$item->name}}', {{count($item->sales_item) ? $item->sales_item->price : 0 }} )">
          <template slot="button"><a class="btn btn-primary btn-xs" href="{{route('items.edit', $item->id)}}">Endre</a></template>
        </product>
      @endforeach
    </ul>
  </div>
</div>

@endsection

@section('scripts')
  <script src="{{ URL::asset('js/pos.js') }}"></script>
@endsection
