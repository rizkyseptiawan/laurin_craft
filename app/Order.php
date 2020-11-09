<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'paid_at', 'canceled_at'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor for `status` attribute.
     * This attribute will be available to check order status.
     *
     * @return string
     *
     * @see https://laravel.com/docs/5.8/eloquent-mutators#defining-an-accessor
     */
    public function getStatusAttribute()
    {
        if (!empty($this->paid_at)) {
            return 'Dibayar';
        }

        if (!empty($this->canceled_at)) {
            return 'Dibatalkan';
        }

        return 'Menunggu Pembayaran';
    }

    /**
     * Accessor for `external_invoice_link` attribute.
     * This attribute will be available to open order invoice.
     *
     * @return string
     *
     * @see https://laravel.com/docs/5.8/eloquent-mutators#defining-an-accessor
     */
    public function getExternalInvoiceLinkAttribute()
    {
        return "https://checkout-staging.xendit.co/web/{$this->xendit_invoice_id}";
    }
}
