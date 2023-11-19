<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departaments extends Model
{
    use HasFactory;

    protected $fillable = ['departament_name', 'state_fke', 'user_id'];

    // Relación de uno a muchos directa con la tabla Departaments-Instruments
    public function instruments()
    {
        return $this->hasMany(Instruments::class, 'departament_fke');
    }

    // Relación de uno a uno inversa con la tabla Deparments-States haciendo scope de la fke

    public function states()
    {
        return $this->belongsTo(States::class, 'state_fke');
    }


    // Relación de uno a muchos directa con la tabla Departaments-User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación de uno a muchos directa con la tabla Departaments-Movements
    public function movements()
    {
        return $this->hasMany(Movements::class, 'departament_fke');
    }
}
