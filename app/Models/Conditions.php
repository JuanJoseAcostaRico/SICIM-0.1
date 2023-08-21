<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conditions extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos inversa entre Conditions-Instruments
    public function instruments()
    {
        return $this->belongsTo(Instruments::class, 'condition_fke');
    }
}
