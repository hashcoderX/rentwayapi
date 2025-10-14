<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehical extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'vehical_no',
        'vehical_type',
        'vehical_brand',
        'body_type',
        'vehical_model',
        'meeter',
        'licen_exp',
        'insurence_exp',
        'per_day_rental',
        'per_week_rental',
        'per_month_rental',
        'per_year_rental',
        'per_day_free_duration',
        'per_week_free_duration',
        'per_month_free_duration',
        'per_year_free_duration',
        'addtional_per_mile_cost',
        'deposit_amount',
        'avalibility',
        'description',
        'revenuelicence',
        'insurance_card',
        'emission_certificate',
        'spare_wheel',
        'jack',
        'wheel_brush',
        'fual_level',

    ];

    public $timestamps = false;

    use HasFactory;

    public function images()
    {
        return $this->hasMany(Vehicle_has_image::class, 'vehicle_id');
    }

    public function firstImage()
    {
        return $this->hasOne(Vehicle_has_image::class, 'vehicle_id')->orderBy('id', 'desc');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function latestImage()
    {
        return $this->hasOne(Vehicle_has_image::class, 'vehicle_id')->latestOfMany('id');
    }
}
