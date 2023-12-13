<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillabe = [
        'name',
        'service_day',
        'departure_time',

    ];

    public function busstops()
    {
        return $this->belongsToMany(Busstop::class, 'route_busstop');
    }
}
