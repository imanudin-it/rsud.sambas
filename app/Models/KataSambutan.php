<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KataSambutan extends Model
{
    use HasFactory;
    
    protected $table = "kata_sambutans";
    
    protected $guarded = ['id'];
}
