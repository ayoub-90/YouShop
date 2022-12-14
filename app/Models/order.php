<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'totale_price',
        'payement_mode',
        'payement_id',
        'status',
        'message',
        'trucking_no',
    ];

    public function orderitems()
    {
        return $this->hasMany(orderItem::class);
    }
}
