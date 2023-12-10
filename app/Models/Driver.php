<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['dni', 'name', 'lastname', 'phone', 'license_number', 'license_type'];

    public function buses()
    {
        return $this->belongsToMany(Bus::class, 'bus_drivers');
    }
}
