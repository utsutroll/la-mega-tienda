<?php

namespace App\Http\Livewire\Admin\NPaymentMethod;

use App\Models\Bank;
use App\Models\N_Payment_Method;
use Livewire\Component;
use Livewire\WithPagination;

class NPaymentMethodComponent extends Component
{
    /* Variables */
    public $entries = '5';
    public $sort = 'id';
    public $direcction = 'desc';
    public $payment_id;
    public $type_account;
    public $account;
    public $cedula;
    public $phone;
    public $beneficiary;
    public $bank_id;
    public $type_d;
    public $bankn = '';
    public $code = '';
    public $view = 'create';
    /* End Variables */

    /* Table */

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
            $this->resetPage();
    }

    protected $queryString = [
        'entries' => ['except' => '5']
    ];


    protected $listeners = ['render', 'render'];

    public function render()
    {
        $banks = Bank::all();
        $payments = N_Payment_Method::orderBy($this->sort, $this->direcction)
                                ->paginate($this->entries);

        return view('livewire.admin.n-payment-method.n-payment-method-component', compact('payments', 'banks'));
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

        $this->page = 1;
        $this->entries = '5';

    }
    /* End Table */

    /* Create */
    public function create()
    {
        $this->reset(['type_account']);
        $this->reset(['account']);
        $this->reset(['cedula']);
        $this->reset(['phone']);
        $this->reset(['beneficiary']);
        $this->reset(['bank_id']);
        $this->reset(['type_d']);
    }

    protected $rules = [
        'type_account' => 'required',   
        'account' => 'required|max:20|unique:n_paymente_methods',   
        'cedula' => 'required',   
        'phone' => 'required|max:11',   
        'beneficiary' => 'required',   
        'bank_id' => 'required',   
        'type_d' => 'required',   
    ];

    protected $validationAttributes = [
        'type_account' => 'Tipo de Cuenta',
        'account' => 'Nro. de Cuenta',
        'cedula' => 'Cédula',
        'phone' => 'Celular',
        'beneficiary' => 'Beneficiario',
        'bank_id' => 'Banco',
        'type_d' => 'Tipo de Documento'
    ];

    public function save(){
        
        $this->validate();

        N_Payment_Method::create([
            'type_account' => $this->type_account,
            'account' => $this->account,
            'cedula' => $this->cedula,
            'phone' => $this->phone,
            'beneficiary' => $this->beneficiary,
            'bank_id' => $this->bank_id,
            'type_d' => $this->type_d
        ]);

        $this->reset(['type_account']);
        $this->reset(['account']);
        $this->reset(['cedula']);
        $this->reset(['phone']);
        $this->reset(['beneficiary']);
        $this->reset(['bank_id']);
        $this->reset(['type_d']);

        $this->emit('render');

        $this->emit('paymentAdded');
    }
    /* End Create  */

    /* Edit/Update */

    public function edit($id)
    {
        $payment = N_Payment_Method::find($id);

        $this->payment_id = $id;
        $this->type_account = $payment->type_account;
        $this->account = $payment->account;
        $this->cedula = $payment->cedula;
        $this->phone = $payment->phone;
        $this->beneficiary = $payment->beneficiary;
        $this->bank_id = $payment->bank_id;
        $this->type_d = $payment->type_d;
  
    }

    public function update()
    {
        $this->validate([
            'type_account' => 'required',   
            'account' => "required|max:20|unique:n_paymente_methods,account,$this->payment_id",   
            'cedula' => 'required',   
            'phone' => 'required|max:11',   
            'beneficiary' => 'required',   
            'bank_id' => 'required',   
            'type_d' => 'required',   
        ]);

        $payment = N_Payment_Method::find($this->payment_id);

        $payment->update([
            'type_account' => $this->type_account,
            'account' => $this->account,
            'cedula' => $this->cedula,
            'phone' => $this->phone,
            'beneficiary' => $this->beneficiary,
            'bank_id' => $this->bank_id,
            'type_d' => $this->type_d
        ]);
        
        $this->reset(['type_account']);
        $this->reset(['account']);
        $this->reset(['cedula']);
        $this->reset(['phone']);
        $this->reset(['beneficiary']);
        $this->reset(['bank_id']);
        $this->reset(['type_d']);

        $this->emit('paymentEdited');
        
    }
    /* End Edit/Update */

    /* Show */
    public function show($id)
    {
        $payment = N_Payment_Method::find($id);

        $this->type_account = $payment->type_account;
        $this->account = $payment->account;
        $this->cedula = $payment->cedula;
        $this->phone = $payment->phone;
        $this->beneficiary = $payment->beneficiary;
        $this->bankn = $payment->bank->name;
        $this->code = $payment->bank->code;
        $this->type_d = $payment->type_d;

  
    }
    /* End Show */

    /* Destroy */

    public function destroy($id)
    {
        $payment = N_Payment_Method::findOrFail($id);

        try {
            $payment->delete();
            $this->emit('paymentDeleted');
            
        } catch (\Exception $e) {

            $this->emit('paymentDeleted_e');
        }

    }
    /* End Destroy */
}
