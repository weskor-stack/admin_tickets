<div>
    <h1>Laravel Livewire Dependant Dropdown - Tutsmake.com</h1>
    <div class="form-group row">
        <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
        <div class="col-md-6">
            <select wire:model="selectedState" class="form-control">
                <option value="" selected>Choose customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
   
    @if (!is_null($selectedCustomer))
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
   
            <div class="col-md-6">
                <select class="form-control" name="city_id">
                    <option value="" selected>Choose contact</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->contact_id }}">{{ $contact->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>