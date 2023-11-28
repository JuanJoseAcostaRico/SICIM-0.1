<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentations extends Model
{
    use HasFactory;

    public function supplies()
    {
        return $this->belongsTo(Supplies::class, 'presentation_fke');
    }
}
