<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movements extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // RELACION CON SUPPLIES

    public function supplies()
    {
        return $this->belongsTo(Supplies::class, 'supply_fke');
    }

    // RELACION CON MOVEMENT_TYPES
    public function movement_types()
    {
        return $this->belongsTo(MovementTypes::class, 'movement_types_fke');
    }

    //Relación uno a muchos inversa entre Movements-Departaments
    public function departaments()
    {
        return $this->belongsTo(Departaments::class, 'departament_fke');
    }
}
