<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class N_Payment_Method extends Model
{
    use HasFactory;

    protected $table='n_paymente_methods';

    public $timestamps=false;

    protected $fillable = [
        'type_account', 
        'account',
        'cedula',
        'phone',
        'beneficiary',
        'bank_id',
        'type_d',
    ];

    /**Relacion 1 a muchos **/

    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
