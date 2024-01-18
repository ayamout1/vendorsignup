<div class="container">
    @foreach($addresses as $index => $address)
        <div class="row address">
            <!-- ... All the address fields here, modify the wire:model to something like below: -->
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <label for="city_{{ $index }}">City</label>
                    <input wire:model="addresses.{{ $index }}.city" type="text" id="city_{{ $index }}" name="city_{{ $index }}" class="form-control">
                    @error('addresses.{{ $index }}.city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- ... -->
            <div class="col-12 mt-3">
                <button wire:click="removeAddress({{ $index }})" class="btn btn-danger">Remove Address</button>
            </div>
        </div>
        <hr>
    @endforeach

    <div class="row">
        <div class="col-12 mt-3">
            <button wire:click="addAddress" class="btn btn-success">Add Address</button>

        </div>
    </div>
</div>
