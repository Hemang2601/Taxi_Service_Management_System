<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
    use HasFactory;

    protected $fillable = [
        'car_id',
        'name',
        'email',
        'phone',
        'pickup_date',
        'dropoff_date',
        'route_id'
    ];

    // Relationship: Each booking belongs to a car
    public function car() {
        return $this->belongsTo(Car::class);
    }

    // Relationship: Each booking belongs to a taxi route (optional)
    public function route() {
        return $this->belongsTo(TaxiRoute::class);
    }
}
