<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{

    protected $fillable = [
        'name',
        'company_code',
        'reg_no',
        'register_date',
        'email',
        'password',
        'address',
        'owner_name',
        'contact_no',
        'mobile_number',
        'website',
        'logo',
        'description',
        'payby',
        'header',
        'footer',
        'agreementsideone',
        'agreementsidetwo',
        'currency',
        'located_province',
        'distric',
        'city',
    ];


    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehical::class, 'company_id');
    }

    use HasFactory;

    public $timestamps = false;
}
