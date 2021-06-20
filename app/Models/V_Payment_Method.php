<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_Payment_Method extends Model
{
    use HasFactory;

    protected $table='v_paymente_methods';

    public $timestamps=false;

    protected $fillable = ['type', 'wallet_email', 'name'];
}
