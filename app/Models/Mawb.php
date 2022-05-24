<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mawb extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'mawb';
    
    protected $fillable = [
        'name',
        'code',
        'date_inventory',
        'code_flight',
        'active'
    ];
}
