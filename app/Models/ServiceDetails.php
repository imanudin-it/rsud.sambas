<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetails extends Model
{
    use HasFactory;
    protected $table = "service_details";

    protected $guarded = ['id'];
    
    
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
}
