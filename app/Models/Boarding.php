<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boarding extends Model
{
    use HasFactory;

    protected $fillable = ['confirmation'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_boarding');
    }
}
