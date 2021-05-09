<?php

namespace App\Http\Livewire;

use App\Models\Dollar_Rate;
use Livewire\Component;
use DB;

class DollarRate extends Component
{
    public $priced;

    public function render()
    {
        $dolar = Dollar_Rate::find(1);

        $this->priced = $dolar->price;

        return view('livewire.dollar-rate');
    }

    public function update()
    {
        $dollar = DB::table('dollar_rates')
              ->where('id', 1)
              ->update(['price' => $this->priced]);

        
        $this->emit('dollarEdited');
    }
}
