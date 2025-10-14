<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_has_images extends Model
{
    
    protected $fillable = [
        'add_id',
        'image_path',
    ];
    public $timestamps = false;
    
    use HasFactory;
}
