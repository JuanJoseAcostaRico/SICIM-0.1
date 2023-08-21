<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación de uno a muchos inversa entre Instruments-Conditions \\

    public function conditions()
    {
        return $this->belongsTo(Conditions::class, 'condition_fke');
    }

    //Relación uno a muchos inversa entre Intruments-Departaments
    public function Departaments()
    {
        return $this->belongsTo(Departaments::class, 'departament_fke');
    }
}
