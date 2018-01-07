<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'item_id';
    protected $fillable = ['item_id', 'price'];
}
