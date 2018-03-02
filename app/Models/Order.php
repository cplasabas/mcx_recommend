<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

     public function product(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
