<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['model', 'brand', 'soat', 'capacity','license_plate'];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'bus_drivers');
    }

    //aca quitare los a trips porque ahora la coneccion es como la tabla intermedia
    public function trips(){
        return $this->hasOne(Trip::class);
    }
}
