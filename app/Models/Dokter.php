<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'm_dokter';
    protected $guarded = ['id'];

    public function poly()
    {
        return $this->belongsTo(Poly::class, 'KDPOLY', 'kode');
    }
}
