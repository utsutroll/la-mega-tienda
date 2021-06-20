<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_Partner extends Model
{
    use HasFactory;

    protected $table='business_partners';

    public $timestamps=false;

    protected $fillable = ['partner', 'img', 'link', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
