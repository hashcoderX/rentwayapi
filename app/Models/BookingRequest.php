<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    
    protected $fillable = [
        'id',
        'customer_id',
        'customer_name',
        'province',
        'distric',
        'city',
        'pickup',
        'dropof',
        'pickupdate',
        'dopofdate',
        'type_of_vehicle',
        'note',
        'date_time',
        'views',
        'status',
    ];

    public $timestamps = false;
    
    use HasFactory;
}
