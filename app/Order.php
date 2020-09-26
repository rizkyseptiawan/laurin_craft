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
        } else if (!empty($this->attributes['canceled_at'])) {
            return 'Dibatalkan';
        }

        return 'Menunggu Pembayaran';
    }
}
