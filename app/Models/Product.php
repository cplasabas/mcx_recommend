<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function product(){
        return $this->hasOne('App\Models\Product', 'product_id', 'id');
    }
}
