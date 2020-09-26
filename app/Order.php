<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

    public function getStatusAttribute()
    {
        if (!empty($this->attributes['paid_at'])) {
            return 'Dibayar';
        } elseif (!empty($this->attributes['canceled_at'])) {
            return 'Dibatalkan';
        }

        return 'Menunggu Pembayaran';
    }
}
