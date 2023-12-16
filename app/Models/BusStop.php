<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusStop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'busstops';

    protected $fillable = [
        'name'
    ];

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'bus_route')->withPivot('order');
    }
}
