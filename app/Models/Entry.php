<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = ['date', 'time'];


    public function products(){
        return $this->belongsToMany(Product::class)->using(Product_Entry::class)->withPivot('id','quantity', 'price');
    }
}
