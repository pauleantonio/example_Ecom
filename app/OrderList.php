<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    //
    protected $guarded=[];
    
    public function orderlists(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
