<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'service_day',
        'departure_time',
        'turn',
        'direction'
    ];

    public function busstops()
    {
        return $this->belongsToMany(BusStop::class, 'bus_route')->withPivot('order');
    }

    public function trips()
    {
        return $this->hasOne(Trip::class);
    }
}
