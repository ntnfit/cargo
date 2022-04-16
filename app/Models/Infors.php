<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infors extends Model
{
    use HasFactory;
    protected $table = 'infos';
    public $timestamps = true;

    
    protected $fillable = [
        'name',
        'icon',
        'logo',
        'phone',
        'location',
        'email'
    ];
}
