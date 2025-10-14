<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'agreement_image',
        'companyid',
        'layoutname',
        'p_width',
        'p_height',
        'resulution',
    ];

    public $timestamps = false;
}
