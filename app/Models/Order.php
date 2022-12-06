<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id' , 'order_date'];

    public function customer()
    {
        return $this->belongsTo(User::class , 'customer_id' , 'id');
    }
    
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class , 'order_id' , 'id');
    }
}
