<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación directa de uno a muchos entre Supplies-States

    public function states()
    {
        return $this->hasMany(States::class);
    }
}
