<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovementTypes extends Model
{
    use HasFactory;

    //RELACION CON MOVEMENTS
    public function movements()
    {
        return $this->belongsTo(Movements::class, 'movement_types_fke');
    }
}
