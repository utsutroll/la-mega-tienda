<?php

namespace App\Http\Livewire\Admin\Presentations;

use App\Models\Presentation;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class PresentationComponent extends Component
{
    /* Variables */

    public $search = '';
    public $entries = '5';
    public $sort = 'id';
    public $direcction = 'desc';
    public $name;
    public $medida;
    public $presentation_id;
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
        $presentations = Presentation::where('name', 'LIKE', "%{$this->search}%")
                                ->orWhere('medida', 'LIKE', "%{$this->search}%")
                                ->orderBy($this->sort, $this->direcction)
                                ->paginate($this->entries);
        
        return view('livewire.admin.presentations.presentation-component', compact('presentations'));
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

    /* Create */
    public function create()
    {
        $this->reset(['name']);
        $this->reset(['medida']);
    }

    protected $rules = [
        'name' => 'required|max:25',   
        'medida' => 'required'    
    ];

    protected $validationAttributes = [
        'name' => 'Presentación',
        'medida' => 'Medida'
    ];

    public function save(){
        
        $this->validate();

        Presentation::create([
            'name' => $this->name,
            'medida' => $this->medida,
            'slug' => Str::slug($this->name)
        ]);

        $this->reset(['name']);
        $this->reset(['medida']);

        $this->emit('render');

        $this->emit('presentationAdded');
    }
    /* End Create  */

    /* Edit/Update */

    public function edit($id)
    {
        $presentation = Presentation::find($id);

        $this->presentation_id = $id;
        $this->name = $presentation->name;
        $this->medida = $presentation->medida;
  
    }

    public function update()
    {
        $this->validate([
            'name' => "required|max:25|unique:presentations,name,$this->presentation_id",  
            'medida' => "required" 
        ]);

        $presentation = Presentation::find($this->presentation_id);

        $presentation->update([
            'name' => $this->name,
            'medida' => $this->medida,
            'slug' => Str::slug($this->name)
        ]);
        
        $this->reset(['name']);
        $this->reset(['medida']);
        $this->emit('presentationEdited');
        
    }
    /* End Edit/Update */

    /* Destroy */

    public function destroy($id)
    {
        $presentation = Presentation::findOrFail($id);

        try {
            $presentation->delete();
            $this->emit('presentationDeleted');
            
        } catch (\Exception $e) {

            $this->emit('presentationDeleted_e');
        }
    }
    /* End Destroy */
}
