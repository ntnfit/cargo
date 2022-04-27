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
        'route',
        'master',
        'destination',
        'value',
        'note',
        'shipdate',
        'no',
        'airline',
        'flight_no',
        'flight_departure_date',
        'flight_from_city',
        'connect_flight_no',
        'connect_flight_departure_date',
        'connect_light_departure_from',
        'airport',
        'destination_city',
        'destination_country'
    ];
}
