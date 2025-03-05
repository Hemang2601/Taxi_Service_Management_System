<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'drive_type',
        'car_type',
        'car',
        'customer_name',
        'email',
        'phone',
        'pickup_date',
        'return_date',
        'total_price',
        'status',
    ];
}
