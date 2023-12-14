<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    
    use HasFactory;
    

    protected $fillable = [
        'route_id',
        'bus_id',
        'trip_date',
        'student_capacity',
        'professor_capacity',
    ];
    public function route(){
        return $this->belongsTo(Route::class);
    }
    
    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
