<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id' , 'product_id' , 'price' , 'qty' , 'order_date'];

    public function order()
    {
        return $this->belongsTo(User::class , 'order_id' , 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }

}
