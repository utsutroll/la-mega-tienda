<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $primaryKey = 'id';  // or null

    public $incrementing = false;

    public $timestamps=false;

    protected $fillable = [
        'id',
        'product',
        'category_id',
        'presentation_id',
        'status_p',
        'slug',
        'details',
        'price'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function presentation(){
        return $this->belongsTo(Presentation::class);
    }

    //Relacion muchos a muchos

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    public function entry(){
        return $this->belongsToMany(Entry::class)->using(Product_Entry::class)->withPivot('id','quantity');
    }

    //relacion 1 a 1 polimorfica

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

}
