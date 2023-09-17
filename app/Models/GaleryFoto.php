<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryFoto extends Model
{
    use HasFactory;
    protected $table = 'galery_fotos';
    protected $guarded = ['id'];

    public function galeries()
    {
        return $this->belongsTo(Galery::class);
    }
}
