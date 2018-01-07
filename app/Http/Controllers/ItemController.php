<?php

namespace App\Http\Controllers;

use Session;

use App\Item;
use App\SalesItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Item::all();
      return view('items.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // Validate data
      $this->validate($request, array(
          'item_name' => 'required|string|unique:items,name',
          'item_group' => 'required|string|in:drikke,tillegg,annet'
      ));

      $item = new Item;
      $item->name = $request->item_name;
      $item->item_group = $request->item_group;

      if(Input::has('image')){
        $this->validate($request, array(
            'image' => 'required|image'
        ));
        $filename = $request->image->store('public/items_img');
        $item->img_path = str_replace("public/", "", $filename);
      }
      $item->save();

      if(Input::has('is-sales-item')){
        $this->validate($request, array(
            'price' => 'required|numeric|min:0,01',
        ));
        $sales_item = new SalesItem;
        $sales_item->item_id = $item->id;
        $sales_item->price = $request->price;
        $sales_item->save();
      }

      Session::flash('success', 'Varen ble opprettet.');
      return redirect()->route('items.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
      //dd($item);
      return view('items.edit')->withItem($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

      // Validate data
      $this->validate($request, array(
          'item_name' => 'required|string',
          'item_group' => 'required|string'
      ));

      $item->name = $request->item_name;
      $item->item_group = $request->item_group;

      if(Input::has('image')){
        $this->validate($request, array(
            'image' => 'required|image'
        ));
        $filename = $request->image->store('public/items_img');
        $item->img_path = str_replace("public/", "", $filename);
      }
      $item->save();

      if(Input::has('is-sales-item')){
        $this->validate($request, array(
            'price' => 'required|numeric|min:0,01',
        ));
        $sales_item = SalesItem::firstOrNew(['item_id' => $item->id]);
        $sales_item->price = $request->price;
        $sales_item->save();
      }else{
        $item->sales_item()->delete();
      }

      Session::flash('success', 'Varen ble oppdatert.');
      return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
      $item->delete();
      Session::flash('success', 'Varen ble slettet.');
      return redirect()->route('items.index');
    }
}
