<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    
    use HasFactory;
    

    protected $fillable = [
        'trip_date',
        'route_id',
        'bus_driver_id',
        'student_capacity',
        'professor_capacity',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function busdriver()
    {
        return $this->belongsTo(BusDriver::class, 'bus_driver_id');
    }
}
