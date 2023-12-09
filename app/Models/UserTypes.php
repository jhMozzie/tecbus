<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    use HasFactory;

    // Relación inversa con los usuarios
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
