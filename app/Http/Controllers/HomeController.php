<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Order;
use App\OrderItem;

use Validator;
use DB;

class HomeController extends Controller
{
  public function index()
  {
      $drinkItems = Item::where('item_group', '=', 'drikke')->join('sales_items', 'items.id', '=', "sales_items.item_id")->get();

      $besideItems = Item::where('item_group', '=', 'tillegg')->join('sales_items', 'items.id', '=', "sales_items.item_id")->get();

      $freeItems = DB::table("items")->select('*')
            ->whereNotIn('id',function($query){
               $query->select('item_id')->from('sales_items');
            })->get();
      return view('pos.index')->withDrinkItems($drinkItems)->withBesideItems($besideItems)->withFreeItems($freeItems);
  }

  public function purchase(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'cart.*.id' => 'required|integer|exists:items,id',
      //'cart.*.name' => 'required|string',
      //'cart.*.price' => 'required|integer',
      'cart.*.quantity' => 'required|integer|min:1'
    ]);
    $receipt = [];

    if ($validator->passes()) {
      $order = new Order;
      $orderTotal = 0;
      $order->save();
      foreach ($request->cart as $item) {
        $i = Item::findOrFail($item['id']);
        $price = $i->sales_item->price ?? 0;
        $receipt[] = (object) array(
        'id' => $i->id,
        'name' => $i->name,
        'price' => $price,
        'quantity' => $item['quantity']
        );
        $orderTotal += ($price * $item['quantity']);
        $orderItem = new OrderItem;
        $orderItem->order_id = $order->id;
        $orderItem->item_id = $item['id'];
        $orderItem->quantity = $item['quantity'];
        $orderItem->save();
      }
      $order2 = Order::findOrFail($order->id);
      $order2->total = $orderTotal;
      $order2->save();

      return response()->json([
        'success'=>'Kjøpet ble gjennomført',
        'cart' => $request->cart,
        'receipt' => $receipt,
        'orderTotal' => $orderTotal
      ]);
    }
    return response()->json([
      'error'=>$validator->errors()->all()]);
  }


}
