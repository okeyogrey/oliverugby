<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name','phone_number','location','mpesa_number','mpesa_code','product_id','quantity','status'];
    
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
