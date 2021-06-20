<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img_Slider extends Model
{
    use HasFactory;

    protected $table='img_sliders';

    public $timestamps=false;

    protected $fillable = ['url'];

    //relacion polimorfica

    public function imagen(){
        return $this->morphTo(Slider::class);
    }
}
