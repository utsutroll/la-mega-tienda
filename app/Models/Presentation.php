<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    protected $table='presentations';

    public $timestamps=false;

    protected $fillable = ['name', 'medida', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**Relacion 1 a muchos **/

    public function products(){
        return $this->hasMany(Product::class);
    }

}
