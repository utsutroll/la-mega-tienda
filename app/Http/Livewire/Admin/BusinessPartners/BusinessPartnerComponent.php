<?php

namespace App\Http\Livewire\Admin\BusinessPartners;

use App\Models\Business_Partner;
use Livewire\Component;
use Livewire\WithPagination;

class BusinessPartnerComponent extends Component
{
    /* Variables */

    public $search = '';
    public $entries = '5';
    public $sort = 'id';
    public $direcction = 'desc';
    /* End Variables */
    
    /* Table */

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
            $this->resetPage();
    }

    protected $queryString = [
        'search' => ['except' => ''],
        'entries' => ['except' => '5']
    ];


    protected $listeners = ['render', 'render'];

    public function render()
    {
        $partners = Business_Partner::where('partner', 'LIKE', "%{$this->search}%")
                                    ->orderBy($this->sort, $this->direcction)
                                    ->paginate($this->entries);

        return view('livewire.admin.business-partners.business-partner-component', compact('partners'));
    }

    public function order($sort){

        if ($this->sort == $sort) {
            
            if ($this->direcction == 'desc') {
                $this->direcction = 'asc';
            }else{
                $this->direcction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direcction = 'asc';
        }
        
    }
    public function clear(){

        $this->search = '';
        $this->page = 1;
        $this->entries = '5';

    }
    /* End Table */

    /* Destroy */

    public function destroy($id)
    {
        $slider = Business_Partner::findOrFail($id);

        try {
            $slider->delete();
            $this->emit('partnerDeleted');
            
        } catch (\Exception $e) {

            $this->emit('partnerDeleted_e');
        }

    }
    /* End Destroy */
}
