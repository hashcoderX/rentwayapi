<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'city',
        'images',
        'date_time',
        'validity',
        'status',
        'views',
        'category',
        'availibility',
        'description',
        'province',
        'district',
        'company_id',
    ];
    public $timestamps = false;
}
