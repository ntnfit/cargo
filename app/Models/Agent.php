<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = 'agents';
    public $timestamps = true;

    
    protected $fillable = [
        'name',
        'code',
        'phone',
        'address',
        'active'
    ];
}
