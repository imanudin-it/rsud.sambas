<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilRS extends Model
{
    use HasFactory;

    
    protected $table = 'profil_rs';
    protected $guarded = ['id'];
    
}
