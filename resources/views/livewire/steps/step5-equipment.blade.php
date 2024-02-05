<div class="col-lg-12 col-sm-12" style="text-align: center;">
    <img src="images/TYS-Global-Logo-Blue.png" alt="TYS Global" style="width: inherit; max-width: 350px;">
    <p style="margin-top: -15px; margin-bottom: 30px;">New Subcontractor Submission</p>
</div>
                <div class="row">


                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" style="width: 100%;background-color: white;font-size: 12px;justify-content: left;">
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
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Fee Information
                        </p>
                    </div>

                    <div class="col-lg-3 col-sm-6" style="display: flex;justify-content: center;">
                        <p class="btn-face m-b-20" onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#adadad'" style="width: 100%;background-color: white;color: #adadad;font-size: 12px;justify-content: left;">
                            <i class="fa-solid fa-square-check"></i>
                            Equipment Information
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
    <!-- Equipment Information -->
    <div class="mb-4">
        @foreach ($equipments as $index2 => $equipment)
            <?php $countEquipment = (int)$index2 + 1 ?>
            <h3 style="color: #101e2b;">Equipment @numbertowords($countEquipment)</h3>

            <!-- Equipment Type -->
            <div class="mb-2">
                <select wire:model="equipments.{{$index2}}.equipment_type" class="mt-1 p-2 w-full border rounded-md" id="equipment_type_{{$index2}}" name="equipment_type_{{$index2}}">
                    <option value="">Select Equipment Type</option>
                    <option value="Crane">Crane</option>
                    <option value="Bucket Truck">Bucket Truck</option>
                    <option value="Interior Lift">Interior Lift</option>
                    <option value="Exterior Lift">Exterior Lift</option>
                    <option value="Trailer">Trailer</option>
                    <option value="Other">OTHER</option>
                </select>
                @error("equipments.$index2.equipment_type") <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Make and Model -->
            <div class="mb-2">
                <label for="make_and_model_{{$index2}}" class="block text-sm font-medium text-gray-700">Make and Model</label>
                <input wire:model="equipments.{{$index2}}.make_and_model" type="text" id="make_and_model_{{$index2}}" name="make_and_model_{{$index2}}" class="mt-1 p-2 w-full border rounded-md" required>
                @error("equipments.$index2.make_and_model") <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Reach -->
            <div class="mb-2">
                <label for="reach_{{$index2}}" class="block text-sm font-medium text-gray-700">Reach</label>
                <input wire:model="equipments.{{$index2}}.reach" type="text" id="reach_{{$index2}}" name="reach_{{$index2}}" class="mt-1 p-2 w-full border rounded-md">
                @error("equipments.$index2.reach") <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Quantity -->
            <div class="mb-2">
                <label for="quantity_{{$index2}}" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input wire:model="equipments.{{$index2}}.quantity" type="text" id="quantity_{{$index2}}" name="quantity_{{$index2}}" class="mt-1 p-2 w-full border rounded-md">
                @error("equipments.$index2.quantity") <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Notes with Markdown Editor -->
            <div class="mb-2">
                <label for="notes_{{$index2}}" class="block text-sm font-medium text-gray-700">Notes</label>
                <textarea wire:model="equipments.{{$index2}}.notes" id="notes_{{$index2}}" name="notes_{{$index2}}" class="mt-1 p-2 w-full border rounded-md"></textarea>
                @error("equipments.$index2.notes") <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            @if (count($equipments) > 1)
                <button wire:click.prevent="removeEquipment({{$index2}})" class="btn btn-danger">Remove</button>
            @endif

        @endforeach
        <button wire:click.prevent="addEquipment" class="btn btn-primary">Add Equipment</button>
    </div>
