<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public function sales_item()
  {
      return $this->hasOne('App\SalesItem');
  }
}
