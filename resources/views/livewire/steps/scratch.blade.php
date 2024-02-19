<div class="row">
                    <div class="col-lg-12 col-sm-12" style="text-align: center;">
                        <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
                        <p style="margin-top: -15px; margin-bottom: 30px;">New Subcontractor Submission</p>
                    </div>
                </div>
                <div class="row">
                    <span class="login100-form-title p-b-53" style="color: #0B1E2C;">
                       Equipment Information
                    </span>


                     <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Vendor Information
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Address Information
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Insurance Requirements & Certificates of Insurance
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Vendor Capabilities
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" style="width: 100%;background-color: white;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Equipment Information
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Fee Information
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            W9 Form Submission
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>

                            Sign And Submit
                        </p>
                    </div>
                </div>



<div>
    @foreach ($equipments as $index => $equipment)
    <?php $countequipment = $index + 1 ?>
    <h3 style="color: #101e2b;">Equipment @numbertowords($countequipment)</h3>
    <!-- Equipment Information -->
    <div class="mb-4">
        <!-- Equipment Type -->
        <div class="mb-2">
            <select wire:model="equipment.{{$index}}.equipment_type" type="text" placeholder="Equipment Type" class="mt-1 p-2 w-full border rounded-md" id="equipment_type" name="equipment_type">
                <option value="Crane" selected>Crane</option>
                <option value="Bucket Truck" selected>Bucket Truck</option>
                <option value="Interior Lift">Interior Lift</option>
                <option value="Exterior Lift">Exterior Lift</option>
                <option value="Trailer">Trailer</option>
         <option value="Other">OTHER</option>
            </select>
            @error('equipment_type') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Make and Model -->
        <div class="mb-2">
            <label for="make_and_model" class="block text-sm font-medium text-gray-700">Make and Model</label>
            <input wire:model="equipment.{{$index}}.make_and_model" type="text" id="make_and_model" name="make_and_model" class="mt-1 p-2 w-full border rounded-md" required>
            @error('make_and_model') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Reach -->
        <div class="mb-2">
            <label for="reach" class="block text-sm font-medium text-gray-700">Reach</label>
            <input wire:model="equipment.{{$index}}.reach" type="text" id="reach" name="reach" class="mt-1 p-2 w-full border rounded-md">
            @error('reach') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Quantity -->
        <div class="mb-2">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input wire:model="equipment.{{$index}}.quantity" type="text" id="quantity" name="quantity" class="mt-1 p-2 w-full border rounded-md">
            @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Notes with Markdown Editor -->
        <!-- Assuming you have a Markdown Editor component or something similar integrated -->
        <div class="mb-2">
            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
            <textarea wire:model="equipment.{{$index}}.notes" id="notes" name="notes" class="mt-1 p-2 w-full border rounded-md"></textarea>
            @error('notes') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

            @if (count($contacts) > 1)
            <button wire:click.prevent="removeEquipment({{$index}})" class="btn btn-danger">Remove</button>
            @endif
        </div>
    @endforeach
    <button wire:click.prevent="addContact" class="btn btn-primary">Add Equipment</button>
    {{-- <div class="flex justify-between">
        <button wire:click="previousStep" class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-white rounded-lg">Previous</button>
        <button wire:click="nextStep" class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Next</button>
    </div> --}}
</div>

<div>

    @foreach ($contacts as $index => $contact)
        <?php $countcontact = $index + 1 ?>
    <h3 style="color: #101e2b;">Additional Contacts Number @numbertowords($countcontact)</h3>
        <div class="contact-group" x-data="{ formatPhoneNumber }">
            <input wire:model="contacts.{{$index}}.contact_name" type="text" placeholder="Contact Name" class="contactadditional" id="contact_name" name="contact_name">
            @error('owner_phone') <span class="text-danger">{{ $message }}</span> @enderror
            <input wire:model="contacts.{{$index}}.contact_email" type="email" placeholder="Contact Email" class="contactadditional" id="contact_email" name="contact_email">
            @error('owner_phone') <span class="text-danger">{{ $message }}</span> @enderror
            <input wire:model="contacts.{{$index}}.contact_phone" type="text" wire:model.lazy="contact_phone" x-ref="contact_phone" @blur="formatPhoneNumber($refs.contact_phone)" placeholder="xxx-xxx-xxxx" class="contactadditional" id="contact_phone" name="contact_phone">
            @error('owner_phone') <span class="text-danger">{{ $message }}</span> @enderror
            <select wire:model="contacts.{{$index}}.contact_position" type="text" placeholder="Contact Position" class="contactadditional" id="contact_position" name="contact_position">
                <option value="Owner" selected>Owner</option>
                <option value="Project Manager" selected>Project Manager</option>
                <option value="Designer">Designer</option>
                <option value="Engineer">Engineer</option>
                <option value="Architect">Architect</option>
                <option value="Superintendent">Superintendent</option>
                <option value="Estimator">Estimator</option>
                <option value="Permit Expeditor">Permit Expeditor</option>
                <option value="Admin">Admin</option>
                <option value="Accounting">Accounting</option>
                <option value="Other">OTHER</option>
            </select>
            @error('owner_phone') <span class="text-danger">{{ $message }}</span> @enderror
            @if (count($contacts) > 1)
            <button wire:click.prevent="removeContact({{$index}})" class="btn btn-danger">Remove</button>
            @endif
        </div>
    @endforeach
    <button wire:click.prevent="addContact" class="btn btn-primary">Add Another Contact</button>
</div>
