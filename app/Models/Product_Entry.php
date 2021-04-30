<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Product_Entry extends Pivot
{
    use HasFactory;

    protected $table='entry_product';

    public $timestamps=false;

}
