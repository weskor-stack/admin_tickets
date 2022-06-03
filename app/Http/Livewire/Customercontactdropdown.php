<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Contact;

class Customercontactdropdown extends Component
{
    public $customers;
    public $contacts;

    public $selectedCustomer = NULL;

    public function mount()
    {
        $this->customers = Customer::all();
        $this->contacts = collect();
    }

    public function render()
    {
        //return view('livewire.customercontactdropdown');
        return view('livewire.customercontactdropdown')->extends('layouts.app');
    }

    public function updatedSelectedCustomer($customer)
    {
        $this->contacts = Contact::where('customer_id', $customer)->get();
        if (!is_null($customer)) {
            $this->contacts = Contact::where('customer_id', $customer)->get();
        }
    }
}
