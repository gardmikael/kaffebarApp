<!-- The items are hardcoded in their each seprate group. You could easly pass all Items and filter by ItemGroup -->

<div class="row">
  <div class="col-md-12">
  <h2>Drikke</h2>
    <ul class="product-list">
      @foreach ($drinkItems as $item)
        <product :show-add-button="true" name="{{$item->name}}" :price="{{count($item->sales_item) ? $item->sales_item->price : 0 }}" img-path="{{asset("storage/$item->img_path")}}" @addProduct="addItem({{$item->id}},'{{$item->name}}',{{count($item->sales_item) ? $item->sales_item->price : 0 }})"></product>
      @endforeach
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
  <h2>Tillegg</h2>
    <ul class="product-list">
      @foreach ($besideItems as $item)
        <product :show-add-button="true" name="{{$item->name}}" :price="{{count($item->sales_item) ? $item->sales_item->price : 0 }}" img-path="{{asset("storage/$item->img_path")}}" @addProduct="addItem({{$item->id}},'{{$item->name}}',{{count($item->sales_item) ? $item->sales_item->price : 0 }})"></product>
      @endforeach
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
  <h2>Gratis</h2>
    <ul class="product-list">
      @foreach ($freeItems as $item)
        <product :show-add-button="true" name="{{$item->name}}" :price="0" img-path="{{asset("storage/$item->img_path")}}" @addProduct="addItem({{$item->id}},'{{$item->name}}',0)"></product>
      @endforeach
    </ul>
  </div>
</div>
