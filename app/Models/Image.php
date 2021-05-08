<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $timestamps=false;
    
    protected $fillable = ['url'];

    //relacion polimorfica

    public function imageable(){
        return $this->morphTo(Product::class);
    }
}
