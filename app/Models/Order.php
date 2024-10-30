<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "user_id",
        "customer_id",
        "problem",
        "solution",
        "total",
    ];

    public function services() {
        return $this->belongsToMany(
            'App\Models\Service', 
            'service_orders', 
            'order_id', 
            'service_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
