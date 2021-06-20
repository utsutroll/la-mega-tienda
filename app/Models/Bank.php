<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = ['code', 'name'];


    /**Relacion 1 a muchos **/

    public function paymentM(){
        return $this->hasMany(N_Payment_Method::class);
    }
}
