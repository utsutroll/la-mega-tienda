<?php

namespace App\Http\Livewire;

use App\Models\Slider as ModelsSlider;
use Livewire\WithPagination;

use Livewire\Component;

class Slider extends Component
{
    /* Variables */

    public $search = '';
    public $entries = '5';
    public $sort = 'id';
    public $direcction = 'desc';
    public $name;
    public $tag_id;
    public $view = 'create';
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
        $sliders = ModelsSlider::where('title', 'LIKE', "%{$this->search}%")
                        ->orderBy($this->sort, $this->direcction)
                        ->paginate($this->entries);

        return view('livewire.slider', compact('sliders'));
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
        $slider = Slider::findOrFail($id);

        try {
            $slider->delete();
            $this->emit('sliderDeleted');
            
        } catch (\Exception $e) {

            $this->emit('sliderDeleted_e');
        }

    }
    /* End Destroy */
}
