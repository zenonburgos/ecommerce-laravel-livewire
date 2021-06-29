<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Department;

class CreateOrder extends Component
{

    public $envio_type = 1;

    public $contact, $phone, $address, $reference;

    public $departments, $cities = [], $districts = [];

    public $department_id = "", $city_id = "", $district_id = "";

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required'
    ];

    public function mount(){
        $this->departments = Department::all();
    }

    public function create_order(){

        $rules = $this->rules;

        if($this->envio_type == 2){
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
        }

        $this->validate($rules);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
