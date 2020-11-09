<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'paid_at', 'canceled_at'];

    /**
     * Accessor for `status` attribute.
     * This attribute will be available to check order status.
     *
     * @return string
     *
     * @see https://laravel.com/docs/5.8/eloquent-mutators#defining-an-accessor
     */
    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getStatusAttribute()
    {
        if (!empty($this->paid_at)) {
            return 'Dibayar';
        } elseif (!empty($this->canceled_at)) {
            return 'Dibatalkan';
        }

        return 'Menunggu Pembayaran';
    }
    
}
