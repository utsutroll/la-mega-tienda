<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dollar_Rate extends Model
{
    use HasFactory;

    protected $table='dollar_rates';

    public $timestamps=false;

    protected $fillable = ['price'];
}
