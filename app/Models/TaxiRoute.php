<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxiRoute extends Model
{
    use HasFactory;

    protected $table = 'taxi_routes'; // Explicitly defining the table name

    protected $fillable = [
        'route_name',
        'start_location',
        'end_location'
    ];


}
