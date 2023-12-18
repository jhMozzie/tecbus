<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boarding extends Model
{
    use HasFactory;

    protected $fillable = ['confirmation','trip_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_boarding');
    }
}
