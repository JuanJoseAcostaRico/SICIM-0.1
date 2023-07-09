<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación directa de uno a muchos entre Instruments-Conditions \\

    public function conditions()
    {
        return $this->hasMany(Conditions::class);
    }

    //Relación uno a muchos inversa entre Intruments-Departaments
    public function Departaments()
    {
        return $this->belongsTo(Departaments::class, 'id');
    }
}
