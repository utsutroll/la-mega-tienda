<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'title',
        'subtitle',
        'detail',
        'status',
        'slug',
        'link'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relacion 1 a 1 polimorfica

    public function image(){
        return $this->morphOne(Img_Slider::class,'imagen');
    }
}
