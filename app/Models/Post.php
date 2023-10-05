<?php

namespace App\Models;

use App\Models\Category;
use App\Models\GaleryFoto;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    
    //protected $fillable = ['title','excerpt','body'];
    protected $guarded = ['id'];
    protected $with = ['author', 'category'];      
    
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }

    public function gallery()
    {
        return $this->hasMany(GaleryFoto::class, 'galery_id', 'galery_id');
    }

}
