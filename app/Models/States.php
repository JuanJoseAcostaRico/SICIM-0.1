<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos inversa entre States-Supplies
    public function supplies()
    {
        return $this->belongsTo(Supplies::class);
    }

    //Relación uno a muchos inversa entre States-Departaments
    public function Departaments()
    {
        return $this->belongsTo(Departaments::class, 'state_fke');
    }
}
