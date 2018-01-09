<!-- The items are hardcoded in their each seprate group. You could easly pass all Items and filter ny ItemGroup -->

<div class="row">
  <div class="col-md-12">
  <h2>Drikke</h2>
    <ul class="product-list">
      @foreach ($drinkItems as $item)
        <product :show-add-button="true" name="{{$item->name}}" :price="{{$item->sales_item->price}}" img-path="{{asset("storage/$item->img_path")}}" @add-product="addItem({{$item->id}},'{{$item->name}}',{{$item->sales_item->price}})"></product>
      @endforeach
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
  <h2>Tillgg</h2>
    <ul class="product-list">
      @foreach ($besideItems as $item)
        <product :show-add-button="true" name="{{$item->name}}" :price="{{$item->sales_item->price}}" img-path="{{asset("storage/$item->img_path")}}" @add-product="addItem({{$item->id}},'{{$item->name}}',{{$item->sales_item->price}})"></product>
      @endforeach
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
  <h2>Gratis</h2>
    <ul class="product-list">
      @foreach ($freeItems as $item)
        <product :show-add-button="true" name="{{$item->name}}" :price="{{$item->sales_item->price}}" img-path="{{asset("storage/$item->img_path")}}" @add-product="addItem({{$item->id}},'{{$item->name}}',{{$item->sales_item->price}})"></product>
      @endforeach
    </ul>
  </div>
</div>
