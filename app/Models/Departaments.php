<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departaments extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación de uno a uno directa con la tabla Deparments-States

    public function states()
    {
        return $this->hasOne(States::class);
    }

    // Relación de uno a muchos directa con la tabla Departaments-Instruments
    public function instruments()
    {
        return $this->hasMany(Instruments::class);
    }

    // Relación de uno a muchos directa con la tabla Departaments-User
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
