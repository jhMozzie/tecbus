<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusStop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillabe = [
        'name'
    ];



    public function busstops()
    {
        return $this->belongsToMany(BusStop::class, 'route_busstop');
    }
}
