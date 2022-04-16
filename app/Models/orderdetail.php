<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;
    protected $table = 'orders_detail';
    public $timestamps = true;

    
    protected $fillable = [
        'order_id',
        'description',
        'weight'
    ];
}
