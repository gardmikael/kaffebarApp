<div class="row">
  <div class="col-md-12">
  <h2>Drikke</h2>
    <ul class="product-list">
      @foreach ($drinkItems as $item)
        <li class="product">
          <div class="box">
            <img src='{{asset("storage/$item->img_path")}}'/>
            <i class="fa fa-plus" v-on:click="addItem({{$item->id}}, '{{$item->name}}', {{$item->sales_item->price}} )"></i>
            <h2>{{$item->name}}</h2>
            <p>{{$item->sales_item->price}} <span>NOK</span></p>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
  <h2>Tillegg</h2>
    <ul class="product-list">
      @foreach ($besideItems as $item)
        <li class="product">
          <div class="box">
            <img src="{{asset("storage/$item->img_path")}}"/>
            <i class="fa fa-plus" v-on:click="addItem({{$item->id}}, '{{$item->name}}', {{$item->sales_item->price}} )"></i>
            <h2>{{$item->name}}</h2>
            <p>{{$item->sales_item->price}} <span>NOK</span></p>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
  <h2>Gratis</h2>
    <ul class="product-list">
      @foreach ($freeItems as $item)
        <li class="product">
          <div class="box">
            <img src='{{asset("storage/$item->img_path")}}'/>
            <i class="fa fa-plus" v-on:click="addItem({{$item->id}}, '{{$item->name}}', 0 )"></i>
            <h2>{{$item->name}}</h2>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>
