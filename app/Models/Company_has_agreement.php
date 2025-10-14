<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_has_agreement extends Model
{
    protected $fillable = [
        'company_id',
        'layoutwidth',
        'layoutheight',
        'printing',
        'dpi',
        'pagenum',
        'agreementurl',
    ];

    use HasFactory;

    public $timestamps = false;
}
