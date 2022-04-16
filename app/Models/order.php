<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = true;

    
    protected $fillable = [
        'order_id',
        'shipdate',
        'deldate',
        'sender',
        'receiver',
        'remark',
        'weight',
        'package',
        'tax',
        'discount',
        'total'
    ];
}
