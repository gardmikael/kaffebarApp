<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $timestamps = false;
    protected $primaryKey = ['order_id', 'item_id'];
    public $incrementing = false;
}
