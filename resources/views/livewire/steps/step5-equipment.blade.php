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
        <!-- Equipment Type -->
        <div class="mb-2">
            <label for="equipment_type" class="block text-sm font-medium text-gray-700">Equipment Type</label>
            <input wire:model="equipment_type" type="text" id="equipment_type" name="equipment_type" class="mt-1 p-2 w-full border rounded-md" required>
            @error('equipment_type') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Make and Model -->
        <div class="mb-2">
            <label for="make_and_model" class="block text-sm font-medium text-gray-700">Make and Model</label>
            <input wire:model="make_and_model" type="text" id="make_and_model" name="make_and_model" class="mt-1 p-2 w-full border rounded-md" required>
            @error('make_and_model') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Reach -->
        <div class="mb-2">
            <label for="reach" class="block text-sm font-medium text-gray-700">Reach</label>
            <input wire:model="reach" type="text" id="reach" name="reach" class="mt-1 p-2 w-full border rounded-md">
            @error('reach') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Quantity -->
        <div class="mb-2">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input wire:model="quantity" type="text" id="quantity" name="quantity" class="mt-1 p-2 w-full border rounded-md">
            @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Notes with Markdown Editor -->
        <!-- Assuming you have a Markdown Editor component or something similar integrated -->
        <div class="mb-2">
            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
            <textarea wire:model="notes" id="notes" name="notes" class="mt-1 p-2 w-full border rounded-md"></textarea>
            @error('notes') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>

