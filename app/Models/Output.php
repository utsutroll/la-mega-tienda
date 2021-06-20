<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = ['date', 'time'];

    public function products(){
        return $this->belongsToMany(Product::class)->using(Output_Product::class)->withPivot('id','quantity', 'observation');
    }
}
