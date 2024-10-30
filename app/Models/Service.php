<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "price",
    ];

    public function orders() {
        return $this->belongsToMany(
            'Apps\Models\Order',
            'service_orders',
            'service_id',
            'order_id'
        );
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
